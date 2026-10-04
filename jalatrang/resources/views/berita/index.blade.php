@extends('layouts.app')

@section('title', 'Berita & Informasi')
@section('page_title', 'Berita & Informasi')
@section('page_subtitle', 'Informasi terkini dari Desa Jalatrang')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Berita</li>
@endsection

@section('content')
<div class="row">
       <!-- Sidebar Filter -->
    <div class="col-lg-3 mb-4">
      <div class="sidebar-sticky">
        <div class="filter-box">
            <div class="filter-header">
                <i class="bi bi-funnel-fill me-1"></i> Filter Berita
            </div>
            <div class="filter-body">
                <form method="GET" action="{{ route('berita.index') }}">
                    <label class="form-label fw-semibold">Kata Kunci</label>
                    <input type="text" name="kata_kunci" class="form-control mb-3"
                           value="{{ request('kata_kunci') }}" placeholder="Cari berita...">

                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" class="form-select mb-3">
                        <option value="">Semua Kategori</option>
                        @foreach (\App\Models\Berita::KATEGORI as $k)
                            <option value="{{ $k }}" @selected(strcasecmp((string) request('kategori'), $k) === 0)>{{ $k }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary w-100 mb-2">Cari</button>
                    <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
                </form>
            </div>
        </div>

        <!-- Tombol Trigger Modal Tambah -->
           <button type="button" class="btn btn-success w-100 mt-3 rounded-4" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-circle-fill me-1"></i> Tambah Berita
        </button>
      </div>
    </div>

    <!-- Main Content: Card Grid -->
    <div class="col-lg-9">
        <div class="row">
            @forelse ($beritas as $berita)
                <div class="col-md-6 col-xl-4 mb-4">
                    <div class="card card-berita h-100">
                        <a href="{{ route('berita.show', $berita) }}">
                            <img src="{{ $berita->gambar_url }}" class="card-img-top" alt="{{ $berita->judul }}" loading="lazy">
                        </a>

                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge badge-kategori text-white">{{ $berita->kategori }}</span>
                                <small class="text-muted">{{ $berita->tanggal }}</small>
                            </div>

                            <h6 class="fw-bold">
                                <a href="{{ route('berita.show', $berita) }}" class="text-decoration-none">{{ Str::limit($berita->judul, 70) }}</a>
                            </h6>

                            <p class="text-muted small flex-grow-1">{{ Str::limit(strip_tags($berita->isi), 85) }}</p>

                            <div class="mb-2">
                                @foreach ($berita->tags as $tag)
                                    <a href="{{ route('berita.index', ['kata_kunci' => $tag]) }}" class="tag-pill">#{{ $tag }}</a>
                                @endforeach
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-1">
                                <small class="text-muted"><i class="bi bi-eye"></i> {{ number_format($berita->dilihat ?? 0) }}</small>
                                <a href="{{ route('berita.show', $berita) }}" class="btn btn-sm btn-baca">Baca</a>
                            </div>

                            <!-- Aksi admin (Edit & Hapus via Modal) -->
                            <div class="admin-actions mt-2 pt-2 border-top d-flex gap-2">
                                <button type="button"
                                        class="btn btn-outline-warning w-50 btn-edit"
                                        data-id="{{ $berita->id }}"
                                        data-judul="{{ $berita->judul }}"
                                        data-kategori="{{ $berita->kategori }}"
                                        data-isi="{{ $berita->isi }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </button>
                                <button type="button"
                                        class="btn btn-outline-danger w-50 btn-hapus"
                                        data-id="{{ $berita->id }}"
                                        data-judul="{{ $berita->judul }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalHapus">
                                    <i class="bi bi-trash me-1"></i> Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-light text-center py-5 border">
                        <i class="bi bi-newspaper display-4 text-muted d-block mb-2"></i>
                        <span class="text-muted">Berita tidak ditemukan.</span>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- "Showing 1 to 12 of 134 results" + nomor halaman (view bootstrap-5) --}}
        @if ($beritas->hasPages())
            <div class="mt-3">
                {{ $beritas->links() }}
            </div>
        @endif
    </div>
</div>

<!-- ========================================== -->
<!-- 2. MODAL TAMBAH BERITA                     -->
<!-- ========================================== -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="filter-header d-flex justify-content-between align-items-center">
                <h5 class="modal-title fs-6 mb-0" id="modalTambahLabel">
                    <i class="bi bi-plus-circle-fill me-1"></i> Tambah Berita
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label fw-semibold">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" placeholder="Judul berita...">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label fw-semibold">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach (\App\Models\Berita::KATEGORI as $k)
                                <option value="{{ $k }}" @selected(old('kategori') == $k)>{{$k }}</option>
                            @endforeach
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label fw-semibold">Foto Berita (Opsional)</label>
                        <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label fw-semibold">Isi Berita</label>
                        <textarea name="isi" id="isi" rows="5" class="form-control @error('isi') is-invalid @enderror" placeholder="Tulis isi berita di sini...">{{ old('isi') }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- 3. MODAL EDIT BERITA                       -->
<!-- ========================================== -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="filter-header d-flex justify-content-between align-items-center">
                <h5 class="modal-title fs-6 mb-0" id="modalEditLabel">
                    <i class="bi bi-pencil-square me-1"></i> Edit Berita
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEdit" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_judul" class="form-label fw-semibold">Judul</label>
                        <input type="text" name="judul" id="edit_judul" class="form-control @error('judul_edit') is-invalid @enderror" placeholder="Judul berita...">
                        @error('judul_edit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="edit_kategori" class="form-label fw-semibold">Kategori</label>
                        <select name="kategori" id="edit_kategori" class="form-select @error('kategori_edit') is-invalid @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach (\App\Models\Berita::KATEGORI as $k)
                                <option value="{{ $k }}">{{ $k }}</option>
                            @endforeach
                        </select>
                        @error('kategori_edit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="edit_gambar" class="form-label fw-semibold">Ganti Foto Berita (Opsional)</label>
                        <input type="file" name="gambar" id="edit_gambar" class="form-control @error('gambar_edit') is-invalid @enderror" accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                        @error('gambar_edit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="edit_isi" class="form-label fw-semibold">Isi Berita</label>
                        <textarea name="isi" id="edit_isi" rows="5" class="form-control @error('isi_edit') is-invalid @enderror" placeholder="Tulis isi berita di sini..."></textarea>
                        @error('isi_edit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- 4. MODAL KONFIRMASI HAPUS                  -->
<!-- ========================================== -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white py-2">
                <h5 class="modal-title fs-6" id="modalHapusLabel">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i> Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="bi bi-trash text-danger display-4 d-block mb-2"></i>
                <p class="mb-1">Apakah Anda yakin ingin menghapus berita berikut?</p>
                <strong id="hapus_judul" class="text-dark d-block px-3"></strong>
                <small class="text-muted mt-2 d-block">Tindakan ini tidak dapat dibatalkan.</small>
            </div>
            <div class="modal-footer bg-light justify-content-center">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                <form id="formHapus" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // 1. Populate Modal Edit
        const modalEdit = document.getElementById('modalEdit');
        if (modalEdit) {
            modalEdit.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                if (!button) return;

                const id = button.getAttribute('data-id');
                const form = document.getElementById('formEdit');
                form.action = `{{ url('berita') }}/${id}`;

                document.getElementById('edit_judul').value = button.getAttribute('data-judul');
                const selKategori = document.getElementById('edit_kategori');
                const nilaiKategori = (button.getAttribute('data-kategori') || '').toLowerCase();
                selKategori.value = '';
                Array.from(selKategori.options).forEach(function (opt) {
                    if (opt.value.toLowerCase() === nilaiKategori) selKategori.value = opt.value;
                });
                document.getElementById('edit_isi').value = button.getAttribute('data-isi');
            });
        }

        // 2. Populate Modal Hapus
        const modalHapus = document.getElementById('modalHapus');
        if (modalHapus) {
            modalHapus.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                if (!button) return;

                const id = button.getAttribute('data-id');
                const judul = button.getAttribute('data-judul');

                const form = document.getElementById('formHapus');
                form.action = `{{ url('berita') }}/${id}`;

                document.getElementById('hapus_judul').textContent = `"${judul}"`;
            });
        }

        // 3. Auto-open Modal jika ada Error Validasi (Aman dari Linter)
        const hasErrors = {{ $errors->any() ? 'true' : 'false' }};
        const isEditError = {{ session('is_edit_error') ? 'true' : 'false' }};

        if (hasErrors && !isEditError) {
            const elTambah = document.getElementById('modalTambah');
            if (elTambah) new bootstrap.Modal(elTambah).show();
        }

        if (isEditError) {
            const elEdit = document.getElementById('modalEdit');
            if (elEdit) new bootstrap.Modal(elEdit).show();
        }
    });
</script>
@endpush
@endsection