@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
<style>
    .dashboard-watermark {
        position: fixed;
        top: 50%;
        left: calc(50% + 130px); /* Adjust for sidebar */
        transform: translate(-50%, -50%);
        opacity: 0.05;
        pointer-events: none;
        z-index: 0;
        width: 60%;
        max-width: 600px;
    }
</style>
<img src="{{ asset('images/logo.png') }}" class="dashboard-watermark" alt="Logo">
<div class="row g-4 mb-4" style="position: relative; z-index: 1;">
    <div class="col-md-3">
        <div class="stat-card" style="background:var(--primary)">
            <div class="d-flex justify-content-between align-items-center">
                <div><p class="mb-1 opacity-75 small">Total Mobil</p><h3 class="fw-bold mb-0">{{ $totalCars }}</h3></div>
                <i class="bi bi-car-front-fill fs-1 opacity-25"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background:#28a745">
            <div class="d-flex justify-content-between align-items-center">
                <div><p class="mb-1 opacity-75 small">Tersedia</p><h3 class="fw-bold mb-0">{{ $availableCars }}</h3></div>
                <i class="bi bi-check-circle-fill fs-1 opacity-25"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background:#dc3545">
            <div class="d-flex justify-content-between align-items-center">
                <div><p class="mb-1 opacity-75 small">Terjual</p><h3 class="fw-bold mb-0">{{ $soldCars }}</h3></div>
                <i class="bi bi-bag-check-fill fs-1 opacity-25"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background:var(--accent)">
            <div class="d-flex justify-content-between align-items-center">
                <div><p class="mb-1 opacity-75 small">Pesan Baru</p><h3 class="fw-bold mb-0">{{ $unreadMessages }}</h3></div>
                <i class="bi bi-envelope-fill fs-1 opacity-25"></i>
            </div>
        </div>
    </div>
</div>

<div class="row g-4" style="position: relative; z-index: 1;">
    <div class="col-lg-7">
        <div class="card p-4">
            <h6 class="fw-bold mb-3">Mobil Terbaru</h6>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light"><tr><th>Mobil</th><th>Harga</th><th>Status</th></tr></thead>
                    <tbody>
                        @foreach($recentCars as $car)
                        <tr>
                            <td>
                                <strong>{{ $car->brand->name }} {{ $car->name }}</strong>
                                <small class="d-block text-muted">{{ $car->year }} · {{ ucfirst($car->condition) }}</small>
                            </td>
                            <td><small>{{ $car->price_formatted }}</small></td>
                            <td><span class="badge {{ $car->status === 'tersedia' ? 'bg-success' : 'bg-danger' }}">{{ ucfirst($car->status) }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('admin.cars.index') }}" class="btn btn-sm btn-outline-primary mt-2">Lihat Semua</a>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card p-4">
            <h6 class="fw-bold mb-3">Pesan Terbaru</h6>
            @foreach($recentMessages as $msg)
            <div class="d-flex gap-3 mb-3 pb-3 border-bottom">
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center flex-shrink-0" style="width:40px;height:40px;font-weight:bold">
                    {{ strtoupper(substr($msg->name,0,1)) }}
                </div>
                <div>
                    <strong class="d-block">{{ $msg->name }}</strong>
                    <small class="text-muted">{{ Str::limit($msg->message, 60) }}</small>
                    @if($msg->status === 'unread')<span class="badge bg-danger ms-1" style="font-size:.65rem">Baru</span>@endif
                </div>
            </div>
            @endforeach
            <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
        </div>
    </div>
</div>
@endsection
