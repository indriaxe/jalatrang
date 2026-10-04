<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $fillable = ['judul', 'kategori', 'gambar', 'isi', 'penulis', 'dilihat'];

    /**
     * Daftar kategori (sama dengan filter di jalatrang.id/berita).
     */
    public const KATEGORI = [
        'Pendidikan',
        'Pembangunan',
        'Hiburan',
        'Olahraga',
        'Prestasi',
        'Kategori Lainnya',
    ];

    public const PLACEHOLDER = 'https://placehold.co/400x220?text=Berita+Desa';

    public function getGambarUrlAttribute(): string
    {
        return $this->gambar ? asset('storage/' . $this->gambar) : self::PLACEHOLDER;
    }

    /** Tanggal gaya Indonesia, mis. "26 Sep 2026" / "10 Agt 2026". */
    public function getTanggalAttribute(): string
    {
        return $this->created_at
            ? Carbon::parse($this->created_at)->locale('id')->translatedFormat('j M Y')
            : '-';
    }

    /** Tiga tag otomatis dari kata-kata judul (mis. #desa #jalatrang #2026). */
    public function getTagsAttribute(): array
    {
        $stop = ['yang', 'dengan', 'untuk', 'dalam', 'pada', 'dari', 'usai', 'atau', 'agar', 'serta', 'dan', 'di', 'ke'];

        return collect(preg_split('/[^\p{L}\p{N}]+/u', Str::lower($this->judul), -1, PREG_SPLIT_NO_EMPTY))
            ->reject(fn ($w) => mb_strlen($w) < 4 || in_array($w, $stop, true))
            ->unique()
            ->take(3)
            ->values()
            ->all();
    }

        public function komentars(): HasMany
    {
        return $this->hasMany(Komentar::class);
    }
}
