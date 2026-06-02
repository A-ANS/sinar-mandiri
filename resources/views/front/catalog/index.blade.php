@extends('front.layouts.main')
@section('title', 'Katalog Mobil')

@section('content')
<div class="py-4" style="background:var(--primary)">
    <div class="container">
        <h2 class="fw-bold text-white mb-0">Katalog Mobil</h2>
        <p class="text-white-50 mb-0">{{ $cars->total() }} unit tersedia</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">
        {{-- Filter Sidebar --}}
        <div class="col-lg-3">
            <div class="card p-4 sticky-top" style="top:80px">
                <h6 class="fw-bold mb-3"><i class="bi bi-funnel me-2"></i>Filter</h6>
                <form method="GET" action="{{ route('catalog.index') }}">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Cari Mobil</label>
                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Nama mobil..." value="{{ request('search') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Merek</label>
                        <select name="brand" class="form-select form-select-sm">
                            <option value="">Semua Merek</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Kondisi</label>
                        <select name="condition" class="form-select form-select-sm">
                            <option value="">Semua</option>
                            <option value="baru" {{ request('condition') === 'baru' ? 'selected' : '' }}>Baru</option>
                            <option value="bekas" {{ request('condition') === 'bekas' ? 'selected' : '' }}>Bekas</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Transmisi</label>
                        <select name="transmission" class="form-select form-select-sm">
                            <option value="">Semua</option>
                            <option value="Manual" {{ request('transmission') === 'Manual' ? 'selected' : '' }}>Manual</option>
                            <option value="Otomatis" {{ request('transmission') === 'Otomatis' ? 'selected' : '' }}>Otomatis</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Harga Min (Rp)</label>
                        <input type="number" name="min_price" class="form-control form-control-sm" placeholder="0" value="{{ request('min_price') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Harga Max (Rp)</label>
                        <input type="number" name="max_price" class="form-control form-control-sm" placeholder="1000000000" value="{{ request('max_price') }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm w-100 mb-2">Terapkan Filter</button>
                    <a href="{{ route('catalog.index') }}" class="btn btn-outline-secondary btn-sm w-100">Reset</a>
                </form>
            </div>
        </div>

        {{-- Cars Grid --}}
        <div class="col-lg-9">
            @if($cars->isEmpty())
                <div class="text-center py-5">
                    <i class="bi bi-car-front" style="font-size:5rem; color:#ddd"></i>
                    <h5 class="mt-3 text-muted">Tidak ada mobil ditemukan</h5>
                    <a href="{{ route('catalog.index') }}" class="btn btn-primary mt-2">Lihat Semua</a>
                </div>
            @else
            <div class="row g-4">
                @foreach($cars as $car)
                <div class="col-md-6 col-xl-4">
                    <div class="card h-100">
                        @if($car->thumbnail)
                            <img src="{{ Storage::url($car->thumbnail) }}" class="car-thumbnail w-100" alt="{{ $car->name }}">
                        @else
                            <div class="car-thumbnail w-100 d-flex align-items-center justify-content-center bg-light">
                                <i class="bi bi-car-front" style="font-size:4rem; color:#ccc"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge" style="background:var(--primary)">{{ $car->brand->name }}</span>
                                <span class="badge {{ $car->condition === 'baru' ? 'bg-success' : 'bg-warning text-dark' }}">{{ ucfirst($car->condition) }}</span>
                            </div>
                            <h6 class="card-title fw-bold">{{ $car->name }} {{ $car->year }}</h6>
                            <div class="d-flex flex-wrap gap-2 text-muted small mb-3">
                                <span><i class="bi bi-speedometer2"></i> {{ number_format($car->mileage) }} km</span>
                                <span><i class="bi bi-gear"></i> {{ $car->transmission }}</span>
                                <span><i class="bi bi-palette"></i> {{ $car->color }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <strong style="color:var(--primary)">{{ $car->price_formatted }}</strong>
                                <a href="{{ route('catalog.show', $car) }}" class="btn btn-sm btn-primary rounded-pill">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-4">{{ $cars->links() }}</div>
            @endif
        </div>
    </div>
</div>
@endsection
