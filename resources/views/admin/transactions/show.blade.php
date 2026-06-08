@extends('admin.layouts.app')
@section('title', 'Detail Transaksi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0"><i class="bi bi-receipt me-2" style="color:var(--accent)"></i>Detail Transaksi</h5>
    <a href="{{ route('admin.transactions.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
        <i class="bi bi-arrow-left me-1"></i>Kembali
    </a>
</div>

<div class="row g-4">
    <div class="col-lg-8">

        {{-- Kode & Status --}}
        <div class="card mb-4" style="border-left: 4px solid var(--accent)">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Kode Transaksi</small>
                    <h5 class="fw-bold mb-0">{{ $transaction->kode_transaksi }}</h5>
                    <small class="text-muted">{{ $transaction->created_at->format('d F Y, H:i') }}</small>
                </div>
                <span class="badge fs-6 px-4 py-2 bg-{{ $transaction->status_badge }}">{{ ucfirst($transaction->status) }}</span>
            </div>
        </div>

        {{-- Info Mobil --}}
        <div class="card mb-4">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3" style="color:var(--accent)"><i class="bi bi-car-front me-2"></i>Informasi Mobil</h6>
                <div class="d-flex gap-3 align-items-center">
                    @if($transaction->car->thumbnail)
                        <img src="{{ Storage::url($transaction->car->thumbnail) }}" class="rounded-3" style="width:100px;height:70px;object-fit:cover" alt="">
                    @endif
                    <div>
                        <h6 class="fw-bold mb-0">{{ $transaction->car->brand->name }} {{ $transaction->car->name }}</h6>
                        <p class="text-muted small mb-1">{{ $transaction->car->year }} · {{ ucfirst($transaction->car->condition) }} · {{ $transaction->car->transmission }}</p>
                        <strong style="color:var(--accent)">{{ $transaction->harga_formatted }}</strong>
                    </div>
                </div>
            </div>
        </div>

        {{-- Info Pembeli --}}
        <div class="card">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3" style="color:var(--accent)"><i class="bi bi-person me-2"></i>Data Pembeli</h6>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <small class="text-muted d-block">Nama Lengkap</small>
                        <strong>{{ $transaction->nama_pembeli }}</strong>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted d-block">Email Akun</small>
                        <strong>{{ $transaction->user->email }}</strong>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted d-block">Nomor Telepon</small>
                        <strong>{{ $transaction->telepon }}</strong>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted d-block">Metode Pembayaran</small>
                        <strong>{{ ucfirst($transaction->metode_pembayaran) }}</strong>
                    </div>
                    <div class="col-12">
                        <small class="text-muted d-block">Alamat</small>
                        <strong>{{ $transaction->alamat }}</strong>
                    </div>
                    @if($transaction->catatan)
                    <div class="col-12">
                        <small class="text-muted d-block">Catatan</small>
                        <strong>{{ $transaction->catatan }}</strong>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Update Status --}}
    <div class="col-lg-4">
        <div class="card sticky-top" style="top:80px">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3" style="color:var(--accent)"><i class="bi bi-arrow-repeat me-2"></i>Update Status</h6>
                <form action="{{ route('admin.transactions.updateStatus', $transaction) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label small">Status Transaksi</label>
                        <select name="status" class="form-select">
                            <option value="pending"    {{ $transaction->status === 'pending'    ? 'selected' : '' }}>⏳ Pending</option>
                            <option value="diproses"   {{ $transaction->status === 'diproses'   ? 'selected' : '' }}>🔄 Diproses</option>
                            <option value="selesai"    {{ $transaction->status === 'selesai'    ? 'selected' : '' }}>✅ Selesai</option>
                            <option value="dibatalkan" {{ $transaction->status === 'dibatalkan' ? 'selected' : '' }}>❌ Dibatalkan</option>
                        </select>
                    </div>
                    <div class="alert alert-warning small p-2">
                        <i class="bi bi-info-circle me-1"></i>
                        Status <strong>Selesai</strong> akan otomatis menandai mobil sebagai <strong>Terjual</strong>.
                    </div>
                    <button type="submit" class="btn w-100 fw-bold" style="background:var(--accent);color:#fff">
                        <i class="bi bi-save me-2"></i>Simpan Status
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
