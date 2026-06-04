@extends('front.layouts.main')
@section('title', 'Kontak')

@section('content')
<div class="py-4" style="background:var(--primary)">
    <div class="container">
        <h2 class="fw-bold text-white mb-0">Hubungi Kami</h2>
        <p class="text-white-50 mb-0">Kami siap membantu Anda</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-4">
            <h5 class="fw-bold mb-4">Informasi Kontak</h5>
            <div class="d-flex gap-3 mb-4">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width:48px;height:48px;background:var(--primary)">
                    <i class="bi bi-geo-alt text-white"></i>
                </div>
                <div>
                    <strong>Alamat</strong>
                    <p class="text-muted small mb-0">Jl. Raya Showroom No. 1, Bandung, Jawa Barat</p>
                </div>
            </div>
            <div class="d-flex gap-3 mb-4">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width:48px;height:48px;background:var(--primary)">
                    <i class="bi bi-telephone text-white"></i>
                </div>
                <div>
                    <strong>Telepon</strong>
                    <p class="text-muted small mb-0">0812-3456-7890</p>
                </div>
            </div>
            <div class="d-flex gap-3 mb-4">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width:48px;height:48px;background:var(--primary)">
                    <i class="bi bi-clock text-white"></i>
                </div>
                <div>
                    <strong>Jam Operasional</strong>
                    <p class="text-muted small mb-0">Senin - Sabtu: 08.00 - 17.00<br>Minggu: 09.00 - 15.00</p>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card p-4 p-md-5">
                <h5 class="fw-bold mb-4">Kirim Pesan</h5>
                @if(session('success'))
                    <div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>{{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nama Lengkap *</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email *</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">No. HP *</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Mobil yang Diminati</label>
                            <select name="car_id" class="form-select">
                                <option value="">-- Pilih Mobil --</option>
                                @foreach($cars as $car)
                                    <option value="{{ $car->id }}" {{ (request('car_id') == $car->id || old('car_id') == $car->id) ? 'selected' : '' }}>
                                        {{ $car->brand->name }} {{ $car->name }} {{ $car->year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Pesan *</label>
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="5" placeholder="Tulis pertanyaan atau pesan Anda..." required>{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">
                                <i class="bi bi-send me-2"></i>Kirim Pesan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
