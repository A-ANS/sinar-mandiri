@extends('front.layouts.main')
@section('title', $car->name . ' ' . $car->year)

@section('content')
<div class="py-4" style="background:var(--primary)">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('catalog.index') }}" class="text-white-50">Katalog</a></li>
                <li class="breadcrumb-item active text-white">{{ $car->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-7">
            @if($car->thumbnail)
                <img src="{{ Storage::url($car->thumbnail) }}" class="w-100 rounded-3 mb-3 shadow" style="max-height:400px; object-fit:cover" alt="{{ $car->name }}">
            @else
                <div class="w-100 rounded-3 bg-light d-flex align-items-center justify-content-center mb-3" style="height:400px">
                    <i class="bi bi-car-front" style="font-size:8rem; color:#ccc"></i>
                </div>
            @endif
            @if($car->images->count())
            <div class="row g-2">
                @foreach($car->images as $img)
                <div class="col-3">
                    <img src="{{ Storage::url($img->image) }}" class="w-100 rounded-2" style="height:80px; object-fit:cover; cursor:pointer" alt="Gallery">
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <div class="col-lg-5">
            <div class="d-flex gap-2 mb-3">
                <span class="badge fs-6 px-3" style="background:var(--primary)">{{ $car->brand->name }}</span>
                <span class="badge fs-6 px-3 {{ $car->condition === 'baru' ? 'bg-success' : 'bg-warning text-dark' }}">{{ ucfirst($car->condition) }}</span>
                <span class="badge fs-6 px-3 {{ $car->status === 'tersedia' ? 'bg-info' : 'bg-danger' }}">{{ ucfirst($car->status) }}</span>
            </div>
            <h2 class="fw-bold">{{ $car->name }} <span class="text-muted fw-normal">{{ $car->year }}</span></h2>
            <h3 class="fw-bold mb-4" style="color:var(--accent)">{{ $car->price_formatted }}</h3>

            <div class="row g-3 mb-4">
                <div class="col-6">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-speedometer2 fs-5" style="color:var(--primary)"></i>
                        <div><small class="text-muted d-block">Kilometer</small><strong>{{ number_format($car->mileage) }} km</strong></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-gear fs-5" style="color:var(--primary)"></i>
                        <div><small class="text-muted d-block">Transmisi</small><strong>{{ $car->transmission }}</strong></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-fuel-pump fs-5" style="color:var(--primary)"></i>
                        <div><small class="text-muted d-block">Bahan Bakar</small><strong>{{ $car->fuel }}</strong></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-palette fs-5" style="color:var(--primary)"></i>
                        <div><small class="text-muted d-block">Warna</small><strong>{{ $car->color }}</strong></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-people fs-5" style="color:var(--primary)"></i>
                        <div><small class="text-muted d-block">Kapasitas</small><strong>{{ $car->seats }} Penumpang</strong></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-tag fs-5" style="color:var(--primary)"></i>
                        <div><small class="text-muted d-block">Tipe</small><strong>{{ $car->type }}</strong></div>
                    </div>
                </div>
            </div>

            @if($car->description)
            <div class="mb-4">
                <h6 class="fw-bold">Deskripsi</h6>
                <p class="text-muted">{{ $car->description }}</p>
            </div>
            @endif

            @if($car->status === 'tersedia')
            <div class="d-grid gap-2">
                <a href="{{ route('contact') }}?car_id={{ $car->id }}" class="btn btn-primary btn-lg rounded-pill">
                    <i class="bi bi-chat-dots me-2"></i>Tanya / Beli Sekarang
                </a>
                <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan {{ $car->brand->name }} {{ $car->name }} {{ $car->year }}" target="_blank" class="btn btn-success btn-lg rounded-pill">
                    <i class="bi bi-whatsapp me-2"></i>WhatsApp Kami
                </a>
            </div>
            @else
                <div class="alert alert-danger"><i class="bi bi-x-circle me-2"></i>Mobil ini sudah terjual.</div>
            @endif
        </div>
    </div>

    @if($related->count())
    <div class="mt-5 pt-4 border-top">
        <h4 class="fw-bold mb-4">Mobil Lainnya dari {{ $car->brand->name }}</h4>
        <div class="row g-4">
            @foreach($related as $r)
            <div class="col-md-4">
                <div class="card h-100">
                    @if($r->thumbnail)
                        <img src="{{ Storage::url($r->thumbnail) }}" class="car-thumbnail w-100" alt="{{ $r->name }}">
                    @else
                        <div class="car-thumbnail w-100 d-flex align-items-center justify-content-center bg-light">
                            <i class="bi bi-car-front" style="font-size:3rem;color:#ccc"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h6 class="fw-bold">{{ $r->name }} {{ $r->year }}</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <strong style="color:var(--primary)">{{ $r->price_formatted }}</strong>
                            <a href="{{ route('catalog.show', $r) }}" class="btn btn-sm btn-outline-primary rounded-pill">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
