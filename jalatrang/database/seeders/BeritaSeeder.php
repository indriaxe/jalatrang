<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        // [judul, kategori, tanggal, dilihat]
        $data = [
            ['Malam Penuh Gengsi Dimulai! 16 Tim Berebut Mahkota Juara di Ajang CVC Cup 2026 Desa Jalatrang', 'Olahraga', '2026-09-26', 311],
            ['Pemerintah Desa Jalatrang Kukuhkan Desa Siaga TB, Perkuat Kolaborasi Lintas Sektor Basmi Tuberkulosis', 'Pendidikan', '2026-09-28', 121],
        ];

        Berita::unguard(); // agar created_at/updated_at ikut tersimpan

        foreach ($data as [$judul, $kategori, $tanggal, $dilihat]) {
            Berita::firstOrCreate(
                ['judul' => $judul],
                [
                    'kategori'   => $kategori,
                    'isi'        => "Ini adalah contoh isi berita untuk \"{$judul}\".\n\nGanti teks ini dengan isi berita yang sebenarnya melalui tombol Edit.",
                    'penulis'    => 'Admin',
                    'dilihat'    => $dilihat,
                    'created_at' => $tanggal . ' 08:00:00',
                    'updated_at' => $tanggal . ' 08:00:00',
                ]
            );
        }

        Berita::reguard();
    }
}
