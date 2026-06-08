@extends('admin.layouts.app')
@section('title', 'Edit Merek')
@section('content')
<div class="card p-4" style="max-width:500px">
    <form method="POST" action="{{ route('admin.brands.update', $brand) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Merek *</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $brand->name) }}" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Klasifikasi</label>
            <input type="text" name="classification" class="form-control" value="{{ old('classification', $brand->classification) }}" placeholder="Contoh: Jepang, Eropa, dll">
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold">Logo</label>
            <input type="file" name="logo" class="form-control" accept="image/*">
            @if($brand->logo)
                @if(Str::startsWith($brand->logo, 'http'))
                    <img src="{{ $brand->logo }}" height="50" class="mt-2 d-block">
                @else
                    <img src="{{ Storage::url($brand->logo) }}" height="50" class="mt-2 d-block">
                @endif
            @endif
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">Update</button>
            <a href="{{ route('admin.brands.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
