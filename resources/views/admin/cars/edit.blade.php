@extends('admin.layouts.app')
@section('title', 'Edit Mobil')

@section('content')
<div class="card p-4" style="max-width:900px">
    <form method="POST" action="{{ route('admin.cars.update', $car) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.cars._form')
        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-primary px-4">Update</button>
            <a href="{{ route('admin.cars.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
