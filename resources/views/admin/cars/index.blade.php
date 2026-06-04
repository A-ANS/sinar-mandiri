@extends('admin.layouts.app')
@section('title', 'Data Mobil')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div></div>
    <a href="{{ route('admin.cars.create') }}" class="btn btn-primary rounded-pill"><i class="bi bi-plus-lg me-2"></i>Tambah Mobil</a>
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr><th>Mobil</th><th>Harga</th><th>Kondisi</th><th>Transmisi</th><th>Status</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($cars as $car)
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            @if($car->thumbnail)
                                <img src="{{ Storage::url($car->thumbnail) }}" width="60" height="45" class="rounded object-fit-cover" alt="">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width:60px;height:45px"><i class="bi bi-car-front text-muted"></i></div>
                            @endif
                            <div>
                                <strong>{{ $car->brand->name }} {{ $car->name }}</strong>
                                <small class="d-block text-muted">{{ $car->year }} · {{ $car->color }}</small>
                            </div>
                        </div>
                    </td>
                    <td><strong>{{ $car->price_formatted }}</strong></td>
                    <td><span class="badge {{ $car->condition === 'baru' ? 'bg-success' : 'bg-warning text-dark' }}">{{ ucfirst($car->condition) }}</span></td>
                    <td>{{ $car->transmission }}</td>
                    <td><span class="badge {{ $car->status === 'tersedia' ? 'bg-info' : 'bg-danger' }}">{{ ucfirst($car->status) }}</span></td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <form method="POST" action="{{ route('admin.cars.destroy', $car) }}" onsubmit="return confirm('Hapus mobil ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-5 text-muted">Belum ada data mobil.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3">{{ $cars->links() }}</div>
</div>
@endsection
