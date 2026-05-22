@extends('admin.layouts.app')
@section('title', 'Pesan Masuk')
@section('content')
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light"><tr><th>Pengirim</th><th>Mobil Diminati</th><th>Pesan</th><th>Waktu</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($messages as $msg)
                <tr class="{{ $msg->status === 'unread' ? 'table-warning' : '' }}">
                    <td>
                        <strong>{{ $msg->name }}</strong>
                        <small class="d-block text-muted">{{ $msg->email }}</small>
                        <small class="text-muted">{{ $msg->phone }}</small>
                    </td>
                    <td>{{ $msg->car ? $msg->car->brand->name . ' ' . $msg->car->name : '-' }}</td>
                    <td><small>{{ Str::limit($msg->message, 80) }}</small></td>
                    <td><small class="text-muted">{{ $msg->created_at->diffForHumans() }}</small></td>
                    <td><span class="badge {{ $msg->status === 'unread' ? 'bg-danger' : 'bg-secondary' }}">{{ $msg->status === 'unread' ? 'Baru' : 'Dibaca' }}</span></td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a>
                            <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}" onsubmit="return confirm('Hapus pesan ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-5 text-muted">Belum ada pesan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3">{{ $messages->links() }}</div>
</div>
@endsection
