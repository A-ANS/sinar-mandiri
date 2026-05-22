<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'Dashboard') | Sinar Mandiri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root { --primary: #1a3c6e; --accent: #e8a020; }
        body { background: #f4f6f9; }
        .sidebar { width: 260px; min-height: 100vh; background: var(--primary); position: fixed; top: 0; left: 0; z-index: 1000; transition: .3s; }
        .sidebar-brand { padding: 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar-brand span { color: var(--accent); }
        .sidebar .nav-link { color: rgba(255,255,255,0.7); padding: .75rem 1.5rem; border-radius: 8px; margin: 2px 10px; font-weight: 500; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: rgba(255,255,255,0.1); color: #fff; }
        .sidebar .nav-link i { width: 20px; }
        .main-content { margin-left: 260px; min-height: 100vh; }
        .topbar { background: #fff; padding: .75rem 1.5rem; border-bottom: 1px solid #e9ecef; display: flex; justify-content: space-between; align-items: center; }
        .content-area { padding: 1.5rem; }
        .stat-card { border-radius: 12px; border: none; padding: 1.5rem; color: #fff; }
        .badge-unread { background: #dc3545; color: #fff; font-size: .65rem; border-radius: 10px; padding: 2px 6px; }
        @media(max-width:768px) { .sidebar { margin-left: -260px; } .main-content { margin-left: 0; } }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="sidebar-brand">
        <h5 class="mb-0 text-white fw-bold">Sinar <span>Mandiri</span></h5>
        <small class="text-white-50">Admin Panel</small>
    </div>
    <nav class="nav flex-column pt-3">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer2 me-2"></i>Dashboard
        </a>
        <a class="nav-link {{ request()->routeIs('admin.cars.*') ? 'active' : '' }}" href="{{ route('admin.cars.index') }}">
            <i class="bi bi-car-front me-2"></i>Data Mobil
        </a>
        <a class="nav-link {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}" href="{{ route('admin.brands.index') }}">
            <i class="bi bi-tags me-2"></i>Merek
        </a>
        <a class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
            <i class="bi bi-envelope me-2"></i>Pesan Masuk
        </a>
        <hr class="border-secondary mx-3">
        <a class="nav-link" href="{{ route('home') }}" target="_blank">
            <i class="bi bi-box-arrow-up-right me-2"></i>Lihat Website
        </a>
        <a class="nav-link text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-left me-2"></i>Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    </nav>
</div>

<div class="main-content">
    <div class="topbar">
        <h6 class="mb-0 fw-bold">@yield('title', 'Dashboard')</h6>
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-person-circle fs-5"></i>
            <span class="small">{{ auth()->user()->name }}</span>
        </div>
    </div>
    <div class="content-area">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
