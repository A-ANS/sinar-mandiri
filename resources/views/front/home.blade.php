@extends('front.layouts.main')
@section('title', 'Beranda')

@section('content')
{{-- Hero --}}
<section style="background: linear-gradient(135deg, #1a3c6e 0%, #0f2a52 60%, #1a3c6e 100%); min-height: 85vh; display:flex; align-items:center;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 text-white">
                <span class="badge mb-3 px-3 py-2" style="background:rgba(232,160,32,0.2); color:#e8a020; font-size:.9rem;">🚗 Showroom Terpercaya</span>
                <h1 class="display-4 fw-bold mb-3">Temukan Mobil <br><span style="color:#e8a020">Impian Anda</span></h1>
                <p class="lead text-white-50 mb-4">Koleksi mobil baru & bekas berkualitas dengan harga terbaik. Garansi resmi, proses mudah, dan pelayanan profesional.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('catalog.index') }}" class="btn btn-accent btn-lg px-4 rounded-pill">
                        <i class="bi bi-search me-2"></i>Lihat Katalog
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-4 rounded-pill">
                        <i class="bi bi-whatsapp me-2"></i>Hubungi Kami
                    </a>
                </div>
                <div class="row mt-5 g-3">
                    <div class="col-4 text-center">
                        <h3 class="fw-bold mb-0" style="color:#e8a020">{{ $totalCars }}+</h3>
                        <small class="text-white-50">Unit Tersedia</small>
                    </div>
                    <div class="col-4 text-center">
                        <h3 class="fw-bold mb-0" style="color:#e8a020">{{ $brands->count() }}+</h3>
                        <small class="text-white-50">Merek Mobil</small>
                    </div>
                    <div class="col-4 text-center">
                        <h3 class="fw-bold mb-0" style="color:#e8a020">10+</h3>
                        <small class="text-white-50">Tahun Pengalaman</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center mt-5 mt-lg-0">
                <i class="bi bi-car-front" style="font-size: 18rem; color: rgba(232,160,32,0.15);"></i>
            </div>
        </div>
    </div>
</section>

{{-- Brands --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold section-title">Merek Pilihan</h2>
            <p class="text-muted mt-3">Temukan mobil dari merek-merek ternama</p>
        </div>
        <div class="row g-3 justify-content-center">
            @foreach($brands as $brand)
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('catalog.index', ['brand' => $brand->id]) }}" class="text-decoration-none">
                    <div class="card text-center p-3">
                        @if($brand->logo)
                            <img src="{{ Storage::url($brand->logo) }}" alt="{{ $brand->name }}" height="50" class="object-fit-contain mb-2">
                        @else
                            <i class="bi bi-car-front-fill fs-1 mb-2" style="color:var(--primary)"></i>
                        @endif
                        <p class="mb-0 fw-semibold small text-dark">{{ $brand->name }}</p>
                        <small class="text-muted">{{ $brand->cars_count }} unit</small>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Featured Cars --}}
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h2 class="fw-bold section-title">Mobil Unggulan</h2>
                <p class="text-muted mt-3">Pilihan terbaik untuk Anda</p>
            </div>
            <a href="{{ route('catalog.index') }}" class="btn btn-outline-primary rounded-pill">Lihat Semua</a>
        </div>
        <div class="row g-4">
            @foreach($featuredCars as $car)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    @if($car->thumbnail)
                        <img src="{{ Storage::url($car->thumbnail) }}" class="car-thumbnail w-100" alt="{{ $car->name }}">
                    @else
                        <div class="car-thumbnail w-100 d-flex align-items-center justify-content-center bg-light">
                            <i class="bi bi-car-front" style="font-size:5rem; color:#ccc"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="badge" style="background:var(--primary)">{{ $car->brand->name }}</span>
                            <span class="badge badge-condition {{ $car->condition === 'baru' ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ ucfirst($car->condition) }}
                            </span>
                        </div>
                        <h5 class="card-title fw-bold">{{ $car->name }} <small class="text-muted fw-normal">{{ $car->year }}</small></h5>
                        <div class="d-flex flex-wrap gap-2 text-muted small mb-3">
                            <span><i class="bi bi-speedometer2"></i> {{ number_format($car->mileage) }} km</span>
                            <span><i class="bi bi-fuel-pump"></i> {{ $car->fuel }}</span>
                            <span><i class="bi bi-gear"></i> {{ $car->transmission }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold" style="color:var(--primary)">{{ $car->price_formatted }}</h5>
                            <a href="{{ route('catalog.show', $car) }}" class="btn btn-sm btn-primary rounded-pill">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-5" style="background: var(--accent)">
    <div class="container text-center text-white">
        <h2 class="fw-bold mb-2">Tidak Menemukan yang Anda Cari?</h2>
        <p class="mb-4 opacity-75">Hubungi kami dan tim kami akan membantu Anda menemukan mobil yang tepat.</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg rounded-pill px-5 fw-semibold" style="color:var(--accent)">
            <i class="bi bi-chat-dots me-2"></i>Konsultasi Gratis
        </a>
    </div>
</section>
@endsection

