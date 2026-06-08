@extends('front.layouts.main')
@section('title', 'Form Transaksi - ' . $car->name)

@section('content')
<div class="py-4" style="background:var(--primary)">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('catalog.index') }}" class="text-white-50">Katalog</a></li>
                <li class="breadcrumb-item"><a href="{{ route('catalog.show', $car) }}" class="text-white-50">{{ $car->name }}</a></li>
                <li class="breadcrumb-item active text-white">Form Transaksi</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4 justify-content-center">

        {{-- Info Mobil --}}
        <div class="col-lg-4">
            <div class="card sticky-top" style="top:80px">
                <div class="card-body">
                    <h6 class="fw-bold mb-3" style="color:var(--accent)"><i class="bi bi-car-front me-2"></i>Detail Mobil</h6>
                    @if($car->thumbnail)
                        <img src="{{ Storage::url($car->thumbnail) }}" class="w-100 rounded-3 mb-3" style="height:160px;object-fit:cover" alt="{{ $car->name }}">
                    @endif
                    <h5 class="fw-bold">{{ $car->brand->name }} {{ $car->name }}</h5>
                    <p class="text-muted small mb-1">{{ $car->year }} · {{ $car->condition }} · {{ $car->transmission }}</p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Harga</span>
                        <strong style="color:var(--accent); font-size:1.1rem">{{ $car->price_formatted }}</strong>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form --}}
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-1">Form Transaksi</h4>
                    <p class="text-muted small mb-4">Isi data diri Anda untuk melanjutkan pembelian.</p>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('transactions.store', $car) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama_pembeli" class="form-control @error('nama_pembeli') is-invalid @enderror"
                                value="{{ old('nama_pembeli', auth()->user()->name) }}" placeholder="Masukkan nama lengkap">
                            @error('nama_pembeli')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nomor Telepon <span class="text-danger">*</span></label>
                            <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                                value="{{ old('telepon') }}" placeholder="Contoh: 08123456789">
                            @error('telepon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror"
                                placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                            @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Metode Pembayaran <span class="text-danger">*</span></label>
                            <select name="metode_pembayaran" class="form-select @error('metode_pembayaran') is-invalid @enderror">
                                <option value="">-- Pilih Metode --</option>
                                <option value="tunai" {{ old('metode_pembayaran') === 'tunai' ? 'selected' : '' }}>💵 Tunai</option>
                                <option value="kredit" {{ old('metode_pembayaran') === 'kredit' ? 'selected' : '' }}>💳 Kredit</option>
                                <option value="transfer" {{ old('metode_pembayaran') === 'transfer' ? 'selected' : '' }}>🏦 Transfer Bank</option>
                            </select>
                            @error('metode_pembayaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Catatan <span class="text-muted small">(opsional)</span></label>
                            <textarea name="catatan" rows="2" class="form-control"
                                placeholder="Catatan tambahan untuk penjual...">{{ old('catatan') }}</textarea>
                        </div>

                        <div class="alert alert-warning d-flex align-items-center gap-2 mb-4">
                            <i class="bi bi-info-circle-fill"></i>
                            <small>Dengan mengirim form ini, Anda menyetujui proses transaksi akan dikonfirmasi oleh admin terlebih dahulu.</small>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-lg rounded-pill fw-bold" style="background:var(--accent);color:#fff">
                                <i class="bi bi-check-circle me-2"></i>Ajukan Transaksi
                            </button>
                            <a href="{{ route('catalog.show', $car) }}" class="btn btn-outline-secondary btn-lg rounded-pill">
                                <i class="bi bi-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
