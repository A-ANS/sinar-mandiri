@extends('front.layouts.main')
@section('title', 'Transaksi Saya')

@section('content')
<div class="py-4" style="background:var(--primary)">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Beranda</a></li>
                <li class="breadcrumb-item active text-white">Transaksi Saya</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <h4 class="fw-bold mb-4">Riwayat Transaksi</h4>

    @if($transactions->isEmpty())
        <div class="text-center py-5">
            <i class="bi bi-receipt" style="font-size:4rem;color:#555"></i>
            <p class="text-muted mt-3">Anda belum memiliki transaksi.</p>
            <a href="{{ route('catalog.index') }}" class="btn rounded-pill" style="background:var(--accent);color:#fff">
                <i class="bi bi-car-front me-2"></i>Lihat Katalog
            </a>
        </div>
    @else
        <div class="row g-4">
            @foreach($transactions as $trx)
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                            <div class="d-flex gap-3 align-items-center">
                                @if($trx->car->thumbnail)
                                    <img src="{{ Storage::url($trx->car->thumbnail) }}" class="rounded-3" style="width:80px;height:60px;object-fit:cover" alt="">
                                @endif
                                <div>
                                    <h6 class="fw-bold mb-0">{{ $trx->car->brand->name }} {{ $trx->car->name }}</h6>
                                    <small class="text-muted">{{ $trx->kode_transaksi }} · {{ $trx->created_at->format('d M Y') }}</small><br>
                                    <strong style="color:var(--accent)">{{ $trx->harga_formatted }}</strong>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <span class="badge bg-{{ $trx->status_badge }} px-3 py-2">{{ ucfirst($trx->status) }}</span>
                                <a href="{{ route('transactions.show', $trx) }}" class="btn btn-sm btn-outline-light rounded-pill">
                                    <i class="bi bi-eye me-1"></i>Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-4">{{ $transactions->links() }}</div>
    @endif
</div>
@endsection
