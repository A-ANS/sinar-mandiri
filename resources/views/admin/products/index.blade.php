@extends('admin.layouts.app')
@section('title', 'Data Produk')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div></div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary rounded-pill"><i class="bi bi-plus-lg me-2"></i>Tambah Produk</a>
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr><th>Gambar</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>
                        @if($product->image)
                            <img src="{{ Storage::url($product->image) }}" height="40" class="object-fit-contain rounded">
                        @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width:40px;height:40px"><i class="bi bi-box-seam text-muted"></i></div>
                        @endif
                    </td>
                    <td><strong>{{ $product->name }}</strong></td>
                    <td><span class="badge bg-secondary">{{ $product->category }}</span></td>
                    <td>{{ $product->price_formatted }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-5 text-muted">Belum ada data produk.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3">{{ $products->links() }}</div>
</div>
@endsection
