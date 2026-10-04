<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Pemerintah Desa Jalatrang">
    <meta name="description" content="Kumpulan berita dan informasi terkini dari Desa Jalatrang">
    <meta name="keywords" content="desa jalatrang, website desa, pemerintah desa">
    <title>@yield('title', 'Berita Desa') — Jalatrang</title>
    <link rel="icon" href="{{ config('desa.logo') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        :root { --navy:#16213e; --gold:#d4a017; --blue:#2563eb; }
        body { background:#eef1f5; }

        /* ===== Ticker "INFO TERKINI" ===== */
        .ticker { background:#0f1730; color:#cfd6e4; font-size:.8rem; }
        .ticker-label { background:var(--gold); color:var(--navy); font-weight:700; padding:6px 14px; white-space:nowrap; }
        .ticker-track { overflow:hidden; white-space:nowrap; flex:1; }
        .ticker-move { display:inline-block; padding-left:100%; animation:ticker 55s linear infinite; }
        .ticker-move span { margin-right:48px; }
        .ticker-move span::before { content:"\2022"; color:var(--gold); margin-right:10px; }
        .ticker-track:hover .ticker-move { animation-play-state:paused; }
        .ticker-date { white-space:nowrap; padding:6px 14px; }
        @keyframes ticker { to { transform:translateX(-100%); } }

        /* ===== Navbar ===== */
        .navbar-desa { background:var(--navy); border-bottom:3px solid var(--gold); position:sticky; top:0; z-index:1030; }
        .navbar-desa .brand-logo { width:46px; height:46px; object-fit:contain; }
        .navbar-desa .navbar-brand { line-height:1.15; font-weight:700; letter-spacing:.3px; }
        .navbar-desa .navbar-brand small { display:block; font-size:.68rem; color:#b8c0d0; font-weight:400; letter-spacing:.5px; }
        .navbar-desa .nav-link { color:#cfd6e4; font-weight:500; font-size:.8rem; padding:.4rem .5rem; white-space:nowrap; }
        .navbar-desa .nav-link:hover { color:#fff; }
        .navbar-desa .nav-link.active { background:var(--gold); color:var(--navy); border-radius:20px; }
        .navbar-desa .dropdown-menu { border:0; border-top:3px solid var(--gold); border-radius:0 0 6px 6px; box-shadow:0 8px 20px rgba(0,0,0,.15); }
        .navbar-desa .dropdown-item { font-size:.88rem; }
        .navbar-desa .navbar-toggler { border-color:rgba(255,255,255,.35); }
        .btn-layanan { background:var(--gold); color:var(--navy); font-weight:600; border-radius:20px; font-size:.85rem; }
        .btn-layanan:hover { background:#e0ad1d; color:var(--navy); }

        /* ===== Panel layanan (offcanvas) ===== */
        .offcanvas-desa .offcanvas-header { background:var(--navy); color:#fff; }
        .offcanvas-desa .group-title { font-size:.72rem; font-weight:700; letter-spacing:.6px; text-transform:uppercase; color:#6b7280; margin:14px 0 8px; }
        .svc-item { display:block; padding:10px 12px; border:1px solid #e5e7eb; border-radius:8px; margin-bottom:8px; color:#111827; text-decoration:none; }
        .svc-item:hover { border-color:var(--blue); background:#f5f8ff; }
        .svc-item b { display:flex; justify-content:space-between; font-size:.9rem; }
        .svc-item b em { font-style:normal; font-size:.65rem; background:var(--navy); color:#fff; border-radius:10px; padding:2px 8px; }
        .svc-item small { color:#6b7280; }

        /* ===== Judul halaman ===== */
        .page-head { background:#fff; border-bottom:1px solid #e3e7ee; }
        .page-head .breadcrumb { font-size:.8rem; }
        .page-head h1 { font-size:1.6rem; font-weight:700; color:var(--navy); }

        /* ===== Filter, kartu ===== */
        @media (min-width: 992px) {
        .sidebar-sticky { position:sticky; top:90px; }
        }

        .filter-header { background:var(--navy); color:#fff; padding:12px 16px; border-radius:16px 16px 0 0; font-weight:600; }
        .filter-body { background:#fff; padding:16px; border-radius:0 0 16px 16px; box-shadow:0 2px 8px rgba(0,0,0,.06); }
        .card-berita { border:none; border-radius:16px; box-shadow:0 2px 8px rgba(0,0,0,.08); transition:transform .15s, box-shadow .15s; overflow:hidden; }
        .card-berita:hover { transform:translateY(-3px); box-shadow:0 8px 20px rgba(0,0,0,.12); }
        .card-berita .card-img-top { height:180px; object-fit:cover; }
        .badge-kategori { background:var(--navy); }
        .card-berita h6 a { color:#111827; }
        .card-berita h6 a:hover { color:var(--blue); }
        .tag-pill { display:inline-block; background:#f1f3f6; color:#555; border-radius:20px; padding:3px 10px; font-size:.75rem; margin:0 4px 4px 0; text-decoration:none; }
        .tag-pill:hover { background:#e3e8f0; color:var(--navy); }
        .btn-baca { color:var(--blue); border:1px solid var(--blue); }
        .btn-baca:hover { background:var(--blue); color:#fff; }
        .admin-actions .btn { --bs-btn-padding-y:.1rem; --bs-btn-font-size:.75rem; }

        /* ===== Footer ===== */
        footer.footer-desa { background:var(--navy); color:#cfd6e4; font-size:.9rem; border-top:3px solid var(--gold); }
        footer.footer-desa h6 { color:#fff; font-weight:700; margin-bottom:14px; }
        footer.footer-desa a { color:#cfd6e4; text-decoration:none; }
        footer.footer-desa a:hover { color:var(--gold); }
        footer.footer-desa ul { list-style:none; padding:0; margin:0; }
        footer.footer-desa li { margin-bottom:6px; }
        .footer-bottom { background:#0f1730; color:#9aa4b8; font-size:.8rem; }

        /* Zoom foto kartu hanya saat foto di-hover / disentuh */
        .card-berita > a { display:block; overflow:hidden; }
        .card-berita .card-img-top { transition:transform .4s ease; }
        .card-berita > a:hover .card-img-top,
        .card-berita > a:active .card-img-top { transform:scale(1.1); }

        .navbar-desa .nav-home {
        display:inline-flex; align-items:center; justify-content:center;
        padding:.4rem .5rem;
        color:#fff; font-size:1rem; line-height:1; }
        .navbar-desa .nav-home i { display:block; line-height:1; }
        .navbar-desa .nav-home:hover { color:var(--gold); }
    </style>
</head>
<body>
    {{-- ===== INFO TERKINI ===== --}}
    <div class="ticker d-flex align-items-center">
        <div class="ticker-label"><i class="bi bi-megaphone-fill me-1"></i> INFO TERKINI</div>
        <div class="ticker-track">
            <div class="ticker-move">
                @foreach (config('desa.info_terkini') as $info)
                    <span>{{ $info }}</span>
                @endforeach
            </div>
        </div>
        <div class="ticker-date d-none d-md-block">{{ now()->locale('id')->translatedFormat('l, j F Y') }}</div>
    </div>

    {{-- ===== NAVBAR ===== --}}
    <nav class="navbar navbar-expand-xl navbar-desa py-2">
        <div class="container">
            <a class="navbar-brand text-white d-flex align-items-center" href="{{ route('berita.index') }}">
                <img src="{{ config('desa.logo') }}" alt="Logo Desa" class="brand-logo me-2">
                <span>
                    PEMERINTAH DESA JALATRANG
                    <small>KECAMATAN CIPAKU KABUPATEN CIAMIS</small>
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuUtama" aria-controls="menuUtama" aria-expanded="false" aria-label="Menu">
                <i class="bi bi-list text-white fs-3"></i>
            </button>

            <div class="collapse navbar-collapse" id="menuUtama">
                <ul class="navbar-nav ms-auto align-items-xl-center">
                    <li class="nav-item">
                        
                <li class="nav-item">
                    <a class="nav-link nav-home" href="#" title="Beranda" aria-label="Beranda">
                        <i class="bi bi-house-door-fill"></i>
                    </a>
                </li>
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Profil</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">VISI</a></li>
                            <li><a class="dropdown-item" href="#">MISI</a></li>
                            <li><a class="dropdown-item" href="#">Sejarah</a></li>
                            <li><a class="dropdown-item" href="#">Struktural</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Kependudukan</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('berita.index') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Potensi Wisata</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">IDM &amp; SDGs</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">IDM</a></li>
                            <li><a class="dropdown-item" href="#">SDGs</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Ketahanan Pangan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Statistik</a></li>
                            <li><a class="dropdown-item" href="#">Galeri</a></li>
                            <li><a class="dropdown-item" href="#">Top 10</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Keuangan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">APBdes</a></li>
                            <li><a class="dropdown-item" href="#">PBB</a></li>
                            <li><a class="dropdown-item" href="#">Kegiatan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Download</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Regulasi</a></li>
                            <li><a class="dropdown-item" href="#">Materi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ms-xl-2 mt-2 mt-xl-0">
                        <button class="btn btn-layanan px-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#panelLayanan">
                            <i class="bi bi-grid-fill me-1"></i> Layanan
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- ===== PANEL "Layanan & Toko Desa" ===== --}}
    <div class="offcanvas offcanvas-end offcanvas-desa" tabindex="-1" id="panelLayanan">
        <div class="offcanvas-header">
            <div class="d-flex align-items-center gap-2">
                <img src="{{ config('desa.logo') }}" alt="Logo Desa" width="36" height="36">
                <div>
                    <div class="fw-bold">DESA JALATRANG</div>
                    <small class="text-white-50">PANEL MENU UTAMA</small>
                </div>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Tutup"></button>
        </div>
        <div class="offcanvas-body">
            <h6 class="fw-bold mb-0">Layanan &amp; Toko Desa</h6>
            <small class="text-muted">Portal Digital Desa Jalatrang</small>

            <div class="group-title">Ekonomi &amp; Belanja Warga</div>
            <a href="#" class="svc-item"><b>Warung Desa <em>PASAR</em></b><small>Katalog produk UMKM &amp; hasil tani warga</small></a>
            <a href="#" class="svc-item"><b>Keranjang Belanja <em>0 Item</em></b><small>Periksa daftar belanjaan &amp; checkout</small></a>
            <a href="#" class="svc-item"><b>Kopdes Merah Putih <em>KOPDES</em></b><small>Layanan simpan pinjam &amp; ekonomi warga</small></a>

            <div class="group-title">Literasi &amp; Prestasi</div>
            <a href="#" class="svc-item"><b>Perpustakaan Desa <em>LITERASI</em></b><small>Katalog buku fisik, e-library &amp; pustaka</small></a>
            <a href="#" class="svc-item"><b>Prestasi Desa <em>PRESTASI</em></b><small>Piagam, penghargaan &amp; prestasi kebanggaan</small></a>

            <div class="group-title">Layanan Mandiri &amp; Admin</div>
            <a href="#" class="svc-item"><b>Warga Desa <em>PORTAL</em></b><small>Layanan surat, belanjaan saya &amp; profil</small></a>
            <a href="#" class="svc-item"><b>Admin Desa <em>ADMIN</em></b><small>Panel administrasi &amp; tata kelola desa</small></a>
        </div>
    </div>

    {{-- ===== HEADER HALAMAN (breadcrumb + judul) ===== --}}
    @hasSection('page_title')
        <div class="page-head py-3">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Beranda</a></li>
                        @yield('breadcrumb')
                    </ol>
                </nav>
                <h1 class="mb-0">@yield('page_title')</h1>
                @hasSection('page_subtitle')
                    <p class="text-muted mb-0">@yield('page_subtitle')</p>
                @endif
            </div>
        </div>
    @endif

    <div class="container my-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    {{-- ===== FOOTER ===== --}}
    <footer class="footer-desa mt-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img src="{{ config('desa.logo') }}" alt="Logo" width="52" height="52">
                        <div class="text-white fw-bold lh-sm">PEMERINTAH DESA<br>JALATRANG</div>
                    </div>
                    <p class="mb-2">
                        Jalan Raya Cipaku Nomor 181<br>
                        Desa Jalatrang, Kecamatan Cipaku<br>
                        Kabupaten Ciamis
                    </p>
                    <a href="https://www.google.com/maps/place/Jalatrang" target="_blank" rel="noopener" class="btn btn-sm btn-outline-light">
                        <i class="bi bi-geo-alt-fill me-1"></i> Lihat Peta
                    </a>
                </div>
                <div class="col-6 col-lg-2">
                    <h6>Menu</h6>
                    <ul>
                        <li><a href="#">Beranda</a></li>
                        <li><a href="{{ route('berita.index') }}">Berita</a></li>
                        <li><a href="#">Struktural</a></li>
                        <li><a href="#">APBDes</a></li>
                        <li><a href="#">Prestasi</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3">
                    <h6>Link Terkait</h6>
                    <ul>
                        <li><a href="https://kemendesa.go.id" target="_blank" rel="noopener">Kemendesa</a></li>
                        <li><a href="https://ciamis.go.id" target="_blank" rel="noopener">Kab. Ciamis</a></li>
                        <li><a href="https://jabar.go.id" target="_blank" rel="noopener">Pemprov Jabar</a></li>
                        <li><a href="#">Panel Admin</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h6>Media Sosial</h6>
                    <ul>
                        <li><a href="https://x.com" target="_blank" rel="noopener"><i class="bi bi-twitter-x me-2"></i>twitter/x</a></li>
                        <li><a href="https://facebook.com" target="_blank" rel="noopener"><i class="bi bi-facebook me-2"></i>facebook</a></li>
                        <li><a href="https://www.youtube.com/@jalatrangTV" target="_blank" rel="noopener"><i class="bi bi-youtube me-2"></i>youtube</a></li>
                        <li><a href="https://instagram.com/pemerintahdesajalatrang" target="_blank" rel="noopener"><i class="bi bi-instagram me-2"></i>instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center py-3">
            © {{ date('Y') }} Pemerintah Desa Jalatrang — Semua hak dilindungi.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
