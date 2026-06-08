@extends('front.layouts.main')
@section('title', 'Detail Transaksi - ' . $transaction->kode_transaksi)

@section('content')
<div class="py-4" style="background:var(--primary)">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('transactions.index') }}" class="text-white-50">Transaksi Saya</a></li>
                <li class="breadcrumb-item active text-white">{{ $transaction->kode_transaksi }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4 justify-content-center">
        <div class="col-lg-8">

            {{-- Status Banner --}}
            <div class="card mb-4 border-0" style="background:var(--primary)">
                <div class="card-body p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="text-white-50 small mb-1">Kode Transaksi</p>
                        <h4 class="fw-bold text-white mb-0">{{ $transaction->kode_transaksi }}</h4>
                    </div>
                    <span class="badge fs-6 px-4 py-2 bg-{{ $transaction->status_badge }}">
                        {{ ucfirst($transaction->status) }}
                    </span>
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
                            <p class="text-muted small mb-1">{{ $transaction->car->year }} · {{ $transaction->car->condition }}</p>
                            <strong style="color:var(--accent)">{{ $transaction->harga_formatted }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Info Pembeli --}}
            <div class="card mb-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3" style="color:var(--accent)"><i class="bi bi-person me-2"></i>Data Pembeli</h6>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Nama Lengkap</small>
                            <strong>{{ $transaction->nama_pembeli }}</strong>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Nomor Telepon</small>
                            <strong>{{ $transaction->telepon }}</strong>
                        </div>
                        <div class="col-12">
                            <small class="text-muted d-block">Alamat</small>
                            <strong>{{ $transaction->alamat }}</strong>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Metode Pembayaran</small>
                            <strong>{{ ucfirst($transaction->metode_pembayaran) }}</strong>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Tanggal Pengajuan</small>
                            <strong>{{ $transaction->created_at->format('d M Y, H:i') }}</strong>
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

            <div class="d-flex gap-2">
                <a href="{{ route('transactions.index') }}" class="btn btn-outline-secondary rounded-pill">
                    <i class="bi bi-list-ul me-2"></i>Semua Transaksi
                </a>
                <a href="{{ route('catalog.index') }}" class="btn rounded-pill" style="background:var(--accent);color:#fff">
                    <i class="bi bi-car-front me-2"></i>Lihat Katalog
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
