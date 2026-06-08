<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function create(Car $car)
    {
        if ($car->status !== 'tersedia') {
            return redirect()->route('catalog.show', $car)->with('error', 'Mobil ini sudah tidak tersedia.');
        }

        return view('front.transactions.create', compact('car'));
    }

    public function store(Request $request, Car $car)
    {
        if ($car->status !== 'tersedia') {
            return redirect()->route('catalog.show', $car)->with('error', 'Mobil ini sudah tidak tersedia.');
        }

        $validated = $request->validate([
            'nama_pembeli'      => 'required|string|max:255',
            'telepon'           => 'required|string|max:20',
            'alamat'            => 'required|string|max:500',
            'metode_pembayaran' => 'required|in:tunai,kredit,transfer',
            'catatan'           => 'nullable|string|max:1000',
        ]);

        $transaction = Transaction::create([
            'user_id'           => auth()->id(),
            'car_id'            => $car->id,
            'kode_transaksi'    => 'TRX-' . strtoupper(Str::random(8)),
            'nama_pembeli'      => $validated['nama_pembeli'],
            'telepon'           => $validated['telepon'],
            'alamat'            => $validated['alamat'],
            'metode_pembayaran' => $validated['metode_pembayaran'],
            'harga'             => $car->price,
            'status'            => 'pending',
            'catatan'           => $validated['catatan'] ?? null,
        ]);

        return redirect()->route('transactions.show', $transaction)
            ->with('success', 'Transaksi berhasil dibuat! Kode transaksi Anda: ' . $transaction->kode_transaksi);
    }

    public function show(Transaction $transaction)
    {
        if ($transaction->user_id !== auth()->id()) {
            abort(403);
        }

        return view('front.transactions.show', compact('transaction'));
    }

    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->id())
            ->with('car.brand')
            ->latest()
            ->paginate(10);

        return view('front.transactions.index', compact('transactions'));
    }
}
