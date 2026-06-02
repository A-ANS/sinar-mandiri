<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sinar Mandiri') - Showroom Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root { --primary: #1a3c6e; --accent: #e8a020; }
        body { font-family: 'Segoe UI', sans-serif; }
        .navbar { background: var(--primary) !important; }
        .navbar-brand { font-weight: 800; font-size: 1.4rem; color: #fff !important; }
        .navbar-brand span { color: var(--accent); }
        .nav-link { color: rgba(255,255,255,0.85) !important; font-weight: 500; }
        .nav-link:hover, .nav-link.active { color: var(--accent) !important; }
        .btn-primary { background: var(--primary); border-color: var(--primary); }
        .btn-primary:hover { background: #0f2a52; border-color: #0f2a52; }
        .btn-accent { background: var(--accent); border-color: var(--accent); color: #fff; }
        .btn-accent:hover { background: #c98a10; border-color: #c98a10; color: #fff; }
        .card { border: none; box-shadow: 0 2px 15px rgba(0,0,0,0.08); border-radius: 12px; transition: transform .2s, box-shadow .2s; }
        .card:hover { transform: translateY(-4px); box-shadow: 0 8px 25px rgba(0,0,0,0.15); }
        .badge-condition { font-size: .75rem; padding: .35em .7em; border-radius: 20px; }
        footer { background: var(--primary); color: #fff; }
        footer a { color: rgba(255,255,255,0.7); text-decoration: none; }
        footer a:hover { color: var(--accent); }
        .car-thumbnail { height: 200px; object-fit: cover; border-radius: 12px 12px 0 0; }
        .section-title { position: relative; display: inline-block; }
        .section-title::after { content: ''; position: absolute; bottom: -8px; left: 0; width: 50px; height: 3px; background: var(--accent); border-radius: 2px; }
    </style>
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Sinar <span>Mandiri</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('catalog.*') ? 'active' : '' }}" href="{{ route('catalog.index') }}">Katalog</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kontak</a></li>
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-shield-lock"></i> Admin</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="py-5 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="fw-bold mb-3">Sinar <span style="color:var(--accent)">Mandiri</span></h5>
                <p class="text-white-50 small">Showroom mobil terpercaya dengan koleksi mobil baru dan bekas berkualitas di harga terbaik.</p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-bold mb-3">Navigasi</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('catalog.index') }}">Katalog Mobil</a></li>
                    <li><a href="{{ route('contact') }}">Hubungi Kami</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="fw-bold mb-3">Kontak</h6>
                <ul class="list-unstyled small text-white-50">
                    <li><i class="bi bi-geo-alt me-2"></i>Jl. Raya Showroom No. 1, Bandung</li>
                    <li><i class="bi bi-telephone me-2"></i>0812-3456-7890</li>
                    <li><i class="bi bi-envelope me-2"></i>info@sinarmandiri.com</li>
                </ul>
            </div>
        </div>
        <hr class="border-secondary mt-4">
        <p class="text-center text-white-50 small mb-0">&copy; {{ date('Y') }} Sinar Mandiri. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
