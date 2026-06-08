@extends('front.layouts.main')
@section('title', 'Profil Saya')

@section('content')
<div class="container py-5 mt-5">
    <div class="mb-4">
        <p class="text-uppercase fw-semibold mb-1" style="color:var(--accent); font-size: 0.875rem; letter-spacing: 1px;">Akun Pengguna</p>
        <h2 class="fw-bold fs-2 text-white">Profil Saya</h2>
    </div>

    <div class="card mb-4 bg-dark border-secondary">
        <div class="card-body p-4 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold fs-4" style="width: 64px; height: 64px; background: var(--accent); color: var(--primary);">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <h4 class="fw-bold text-white mb-1">{{ auth()->user()->name }}</h4>
                    <p class="text-white-50 mb-0">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <div class="bg-success bg-opacity-10 border border-success border-opacity-25 rounded p-3 text-center">
                <p class="text-success text-uppercase fw-semibold mb-1" style="font-size: 0.75rem; letter-spacing: 1px;">Status Akun</p>
                <p class="text-success fw-bold mb-0">Aktif</p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card bg-dark border-secondary h-100">
                <div class="card-body p-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card bg-dark border-secondary h-100">
                <div class="card-body p-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-danger bg-opacity-10 border-danger border-opacity-25 mt-4">
        <div class="card-body p-4">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
