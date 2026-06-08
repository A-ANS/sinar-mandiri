<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Car;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::with(['user', 'car.brand'])->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('kode_transaksi', 'like', '%' . $request->search . '%')
                  ->orWhereHas('user', fn($q) => $q->where('name', 'like', '%' . $request->search . '%'));
        }

        $transactions = $query->paginate(15);

        return view('admin.transactions.index', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
        $transaction->load(['user', 'car.brand']);
        return view('admin.transactions.show', compact('transaction'));
    }

    public function updateStatus(Request $request, Transaction $transaction)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai,dibatalkan',
        ]);

        $oldStatus = $transaction->status;
        $transaction->update(['status' => $request->status]);

        // Jika status selesai, tandai mobil sebagai terjual
        if ($request->status === 'selesai' && $oldStatus !== 'selesai') {
            $transaction->car->update(['status' => 'terjual']);
        }

        // Jika dibatalkan dari selesai, kembalikan status mobil
        if ($request->status === 'dibatalkan' && $oldStatus === 'selesai') {
            $transaction->car->update(['status' => 'tersedia']);
        }

        return redirect()->route('admin.transactions.show', $transaction)
            ->with('success', 'Status transaksi berhasil diperbarui.');
    }
}
