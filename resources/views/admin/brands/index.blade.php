@extends('admin.layouts.app')
@section('title', 'Merek')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <div></div>
    <a href="{{ route('admin.brands.create') }}" class="btn btn-primary rounded-pill"><i class="bi bi-plus-lg me-2"></i>Tambah Merek</a>
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light"><tr><th>Logo</th><th>Nama</th><th>Klasifikasi</th><th>Jumlah Mobil</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($brands as $brand)
                <tr>
                    <td>
                        @if($brand->logo)
                            @if(Str::startsWith($brand->logo, 'http'))
                                <img src="{{ $brand->logo }}" height="40" class="object-fit-contain rounded">
                            @else
                                <img src="{{ Storage::url($brand->logo) }}" height="40" class="object-fit-contain rounded">
                            @endif
                        @else
                            <i class="bi bi-car-front fs-4 text-muted"></i>
                        @endif
                    </td>
                    <td><strong>{{ $brand->name }}</strong></td>
                    <td><span class="badge bg-secondary">{{ $brand->classification ?? '-' }}</span></td>
                    <td>{{ $brand->cars_count }} unit</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.brands.edit', $brand) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <form method="POST" action="{{ route('admin.brands.destroy', $brand) }}" onsubmit="return confirm('Hapus merek ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center py-5 text-muted">Belum ada merek.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3">{{ $brands->links() }}</div>
</div>
@endsection
