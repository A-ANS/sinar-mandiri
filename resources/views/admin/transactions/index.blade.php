@extends('admin.layouts.app')
@section('title', 'Data Transaksi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0"><i class="bi bi-receipt me-2" style="color:var(--accent)"></i>Data Transaksi</h5>
</div>

{{-- Filter --}}
<div class="card mb-4">
    <div class="card-body p-3">
        <form method="GET" class="row g-2 align-items-center">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari kode / nama..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select form-select-sm">
                    <option value="">Semua Status</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="diproses" {{ request('status') === 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ request('status') === 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="dibatalkan" {{ request('status') === 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                <a href="{{ route('admin.transactions.index') }}" class="btn btn-sm btn-outline-secondary ms-1">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Pembeli</th>
                    <th>Mobil</th>
                    <th>Harga</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $trx)
                <tr>
                    <td><code>{{ $trx->kode_transaksi }}</code></td>
                    <td>
                        <div class="fw-semibold">{{ $trx->nama_pembeli }}</div>
                        <small class="text-muted">{{ $trx->user->email }}</small>
                    </td>
                    <td>{{ $trx->car->brand->name }} {{ $trx->car->name }}</td>
                    <td><strong style="color:var(--accent)">{{ $trx->harga_formatted }}</strong></td>
                    <td>{{ ucfirst($trx->metode_pembayaran) }}</td>
                    <td><span class="badge bg-{{ $trx->status_badge }}">{{ ucfirst($trx->status) }}</span></td>
                    <td><small>{{ $trx->created_at->format('d M Y') }}</small></td>
                    <td>
                        <a href="{{ route('admin.transactions.show', $trx) }}" class="btn btn-sm btn-outline-light rounded-pill">
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-4">Belum ada transaksi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($transactions->hasPages())
        <div class="card-footer">{{ $transactions->links() }}</div>
    @endif
</div>
@endsection
