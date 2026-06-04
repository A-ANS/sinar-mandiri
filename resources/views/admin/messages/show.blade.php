@extends('admin.layouts.app')
@section('title', 'Detail Pesan')
@section('content')
<div class="card p-4" style="max-width:700px">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h6 class="fw-bold mb-0">Pesan dari {{ $message->name }}</h6>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Kembali</a>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-md-6"><small class="text-muted d-block">Nama</small><strong>{{ $message->name }}</strong></div>
        <div class="col-md-6"><small class="text-muted d-block">Email</small><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></div>
        <div class="col-md-6"><small class="text-muted d-block">No. HP</small><a href="tel:{{ $message->phone }}">{{ $message->phone }}</a></div>
        <div class="col-md-6"><small class="text-muted d-block">Mobil Diminati</small>{{ $message->car ? $message->car->brand->name . ' ' . $message->car->name : '-' }}</div>
        <div class="col-12">
            <small class="text-muted d-block">Pesan</small>
            <div class="bg-light p-3 rounded">{{ $message->message }}</div>
        </div>
        <div class="col-12"><small class="text-muted">Dikirim: {{ $message->created_at->format('d M Y H:i') }}</small></div>
    </div>
    <div class="d-flex gap-2">
        <a href="mailto:{{ $message->email }}" class="btn btn-primary"><i class="bi bi-envelope me-2"></i>Balas Email</a>
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$message->phone) }}" target="_blank" class="btn btn-success"><i class="bi bi-whatsapp me-2"></i>WhatsApp</a>
    </div>
</div>
@endsection
