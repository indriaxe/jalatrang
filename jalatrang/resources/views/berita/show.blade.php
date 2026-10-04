@extends('layouts.app')

@section('title', $berita->judul)
@section('page_title', 'Berita & Informasi')
@section('page_subtitle', 'Informasi terkini dari Desa Jalatrang')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('berita.index') }}" class="text-decoration-none">Berita</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($berita->judul, 50) }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <a href="{{ route('berita.index') }}" class="text-decoration-none"><i class="bi bi-arrow-left"></i> Kembali ke Berita</a>

        <div class="card card-berita mt-3">
            <img src="{{ $berita->gambar ? $berita->gambar_url : 'https://placehold.co/800x300?text=Berita+Desa' }}"
                 class="card-img-top" style="height:auto; max-height:380px; object-fit:cover;" alt="{{ $berita->judul }}">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                    <span class="badge badge-kategori text-white">{{ $berita->kategori }}</span>
                    <small class="text-muted"><i class="bi bi-calendar3"></i> {{ $berita->tanggal }}</small>
                    <small class="text-muted"><i class="bi bi-person"></i> {{ $berita->penulis }}</small>
                    <small class="text-muted ms-auto"><i class="bi bi-eye"></i> {{ number_format($berita->dilihat) }}</small>
                </div>

                <h2 class="fw-bold mt-3">{{ $berita->judul }}</h2>
                <hr>
                <div class="text-secondary" style="line-height:1.8;">{!! nl2br(e($berita->isi)) !!}</div>

                <div class="mt-4">
                    @foreach ($berita->tags as $tag)
                        <a href="{{ route('berita.index', ['kata_kunci' => $tag]) }}" class="tag-pill">#{{ $tag }}</a>
                    @endforeach
                </div>
            </div>
        </div>

                {{-- ================= KOMENTAR ================= --}}
        <style>
            .komentar-title { font-weight:800; color:var(--navy); font-size:1.6rem; }
            .komentar-title i { color:var(--gold); }
            .komentar-box { background:#f8f9fb; border:1px solid #dfe3ea; border-radius:12px; padding:20px; }
            .komentar-box label { font-weight:600; color:#4b5563; font-size:.9rem; }
            .komentar-box .form-control { border-radius:8px; padding:.6rem .8rem; }
            .badge-privat { background:#6c757d; color:#fff; font-size:.65rem; border-radius:6px; padding:2px 6px; vertical-align:middle; }
            .captcha-box { background:#fff; border:1px solid #dfe3ea; border-radius:12px; padding:14px; }
            .captcha-soal { background:#0d6efd; color:#fff; font-family:monospace; font-weight:700; border-radius:8px; padding:.55rem .8rem; white-space:nowrap; }
            .btn-kirim { background:var(--navy); color:#fff; font-weight:700; border-radius:6px; }
            .btn-kirim:hover { background:#0f1730; color:#fff; }
            .komentar-item { background:#fff; border:1px solid #e3e7ee; border-radius:12px; padding:14px 16px; }
            .avatar-k { width:40px; height:40px; border-radius:50%; background:var(--navy); color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700; flex-shrink:0; }
        </style>

        <div class="mt-4" id="komentar">
            <h3 class="komentar-title mb-3">
                <i class="bi bi-chat-dots-fill"></i> Komentar ({{ $komentars->count() }})
            </h3>

            <div class="komentar-box">
                <h6 class="fw-bold mb-3"><i class="bi bi-pencil-square me-1"></i> Tulis Komentar Anda:</h6>

                @if (session('komentar_sukses'))
                    <div class="alert alert-success py-2">{{ session('komentar_sukses') }}</div>
                @endif

                <form method="POST" action="{{ route('komentar.store', $berita) }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="k_nama" class="form-label">Nama Lengkap *</label>
                            <input type="text" id="k_nama" name="nama" value="{{ old('nama') }}" maxlength="100"
                                   class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Anda" required>
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="k_email" class="form-label">Alamat Email * <span class="badge-privat">Privat</span></label>
                            <input type="email" id="k_email" name="email" value="{{ old('email') }}" maxlength="150"
                                   class="form-control @error('email') is-invalid @enderror" placeholder="nama@email.com" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="k_hp" class="form-label">Nomor HP * <span class="badge-privat">Privat</span></label>
                            <input type="text" id="k_hp" name="no_hp" value="{{ old('no_hp') }}" maxlength="20"
                                   class="form-control @error('no_hp') is-invalid @enderror" placeholder="08xxxxxxxxxx" required>
                            @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <label for="k_pesan" class="form-label">Pesan Komentar *</label>
                            <textarea id="k_pesan" name="pesan" rows="4" maxlength="300"
                                      class="form-control @error('pesan') is-invalid @enderror"
                                      placeholder="Tuliskan masukan atau komentar Anda..." required>{{ old('pesan') }}</textarea>
                            @error('pesan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            <div class="d-flex justify-content-between small text-muted mt-1">
                                <span>Dilarang menggunakan kata kasar / ujaran kebencian.</span>
                                <span><span id="sisaKarakter">300</span> karakter tersisa</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="captcha-box">
                                <div class="fw-bold mb-2"><i class="bi bi-shield-fill-check text-primary me-1"></i> Pertanyaan Keamanan (Captcha Anti-Bot) *</div>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="captcha-soal" id="captchaSoal">{{ $captcha }}</div>
                                    <input type="number" name="captcha" class="form-control @error('captcha') is-invalid @enderror"
                                           style="max-width:150px;" placeholder="Jawaban" required autocomplete="off">
                                    <button type="button" class="btn btn-outline-secondary" id="btnCaptcha" title="Soal baru" aria-label="Soal baru">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </button>
                                </div>
                                @error('captcha') <div class="text-danger small mt-2">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-kirim px-4"><i class="bi bi-send-fill me-1"></i> Kirim Komentar</button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Daftar komentar (email & nomor HP tidak ditampilkan) --}}
            <div class="mt-4 d-grid gap-3">
                @foreach ($komentars as $k)
                    <div class="komentar-item d-flex gap-3">
                        <div class="avatar-k">{{ mb_strtoupper(mb_substr($k->nama, 0, 1)) }}</div>
                        <div>
                            <div class="fw-bold">{{ $k->nama }}
                                <small class="text-muted fw-normal ms-2">{{ $k->created_at->locale('id')->diffForHumans() }}</small>
                            </div>
                            <div class="text-secondary">{!! nl2br(e($k->pesan)) !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @push('scripts')
        <script>
            // Hitung sisa karakter
            const pesan = document.getElementById('k_pesan');
            const sisa  = document.getElementById('sisaKarakter');
            const hitung = () => sisa.textContent = 300 - pesan.value.length;
            pesan.addEventListener('input', hitung); hitung();

            // Tombol refresh captcha
            document.getElementById('btnCaptcha').addEventListener('click', async function () {
                const res  = await fetch("{{ route('captcha.baru') }}", { headers: { 'Accept': 'application/json' } });
                const data = await res.json();
                document.getElementById('captchaSoal').textContent = data.soal;
                document.querySelector('input[name="captcha"]').value = '';
            });

            @if ($errors->any() || session('komentar_sukses'))
                document.getElementById('komentar').scrollIntoView();
            @endif
        </script>
        @endpush
    </div>

        {{-- ================= BERITA TERKAIT ================= --}}
    <div class="col-lg-4 mt-4 mt-lg-0">
        <style>
            .terkait-card { background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,.08); }
            .terkait-header { background:var(--navy); color:#fff; font-weight:700; padding:14px 18px; font-size:1.05rem; }
            .terkait-item { display:flex; gap:14px; padding:16px 18px; border-bottom:1px solid #eef0f4; }
            .terkait-item:last-child { border-bottom:0; }
            .terkait-img { width:90px; height:70px; object-fit:cover; border-radius:8px; flex-shrink:0; }
            .terkait-judul { color:#111827; font-weight:600; font-size:.92rem; line-height:1.6; }
            .terkait-item:hover .terkait-judul { color:var(--blue); }
        </style>

        <div class="sidebar-sticky">
            <div class="terkait-card">
                <div class="terkait-header"><i class="bi bi-newspaper me-2"></i> Berita Terkait</div>

                @forelse ($terkait as $t)
                    <a href="{{ route('berita.show', $t) }}" class="terkait-item text-decoration-none">
                        <img src="{{ $t->gambar_url }}" alt="{{ $t->judul }}" class="terkait-img" loading="lazy">
                        <div>
                            <div class="terkait-judul">{{ Str::limit($t->judul, 70) }}</div>
                            <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ $t->tanggal }}</small>
                        </div>
                    </a>
                @empty
                    <div class="p-3 text-muted small">Belum ada berita terkait.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
{{-- ================= TOMBOL KE ATAS ================= --}}
<style>
    .btn-ke-atas {
        position:fixed; right:24px; bottom:24px; z-index:1040;
        width:52px; height:52px; border:0; border-radius:50%;
        background:#1d4b85; color:#f4c20d; font-size:1.5rem;
        display:flex; align-items:center; justify-content:center;
        box-shadow:0 4px 14px rgba(0,0,0,.3); cursor:pointer;
        opacity:0; visibility:hidden; transform:translateY(12px);
        transition:opacity .3s, visibility .3s, transform .3s, background .2s;
    }
    .btn-ke-atas.tampil { opacity:1; visibility:visible; transform:translateY(0); }
    .btn-ke-atas:hover { background:#16396a; }
</style>

<button type="button" id="btnKeAtas" class="btn-ke-atas" aria-label="Kembali ke atas" title="Ke atas">
    <i class="bi bi-chevron-up"></i>
</button>

@push('scripts')
<script>
    const btnKeAtas = document.getElementById('btnKeAtas');

    // Muncul setelah halaman di-scroll lebih dari 400px
    window.addEventListener('scroll', function () {
        btnKeAtas.classList.toggle('tampil', window.scrollY > 400);
    });

    // Klik: gulung halus ke paling atas
    btnKeAtas.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
@endpush
@endsection
