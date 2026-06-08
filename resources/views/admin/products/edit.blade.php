@extends('admin.layouts.app')
@section('title', 'Edit Produk')

@section('content')
<div class="card p-4" style="max-width:600px">
    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Produk *</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Kategori *</label>
                <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $product->category) }}" placeholder="Contoh: Aksesoris, Sparepart" required>
                @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Harga *</label>
                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" min="0" required>
                @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Stok *</label>
            <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $product->stock) }}" min="0" required>
            @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold">Gambar Produk</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            @if($product->image)
                <img src="{{ Storage::url($product->image) }}" height="60" class="mt-2 d-block rounded">
            @endif
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">Update</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
