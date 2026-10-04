<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    /** Buat soal penjumlahan baru, simpan jawabannya di session. */
    public static function buatCaptcha(): string
    {
        $a = random_int(1, 9);
        $b = random_int(1, 9);
        session(['captcha_jawaban' => $a + $b]);

        return "{$a} + {$b} = ?";
    }

    /** Dipakai tombol refresh captcha (JSON). */
    public function captcha()
    {
        return response()->json(['soal' => self::buatCaptcha()]);
    }

    /** Simpan komentar baru. */
    public function store(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'nama'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'no_hp'   => ['required', 'regex:/^[0-9+\-\s]{8,20}$/'],
            'pesan'   => ['required', 'string', 'max:300'],
            'captcha' => ['required', 'numeric'],
        ], [
            'nama.required'    => 'Nama lengkap wajib diisi.',
            'email.required'   => 'Alamat email wajib diisi.',
            'email.email'      => 'Format email tidak valid.',
            'no_hp.required'   => 'Nomor HP wajib diisi.',
            'no_hp.regex'      => 'Nomor HP tidak valid (8-20 angka).',
            'pesan.required'   => 'Pesan komentar wajib diisi.',
            'pesan.max'        => 'Pesan maksimal 300 karakter.',
            'captcha.required' => 'Jawaban captcha wajib diisi.',
            'captcha.numeric'  => 'Jawaban captcha harus berupa angka.',
        ]);

        // Jawaban hanya berlaku sekali pakai
        $benar = session()->pull('captcha_jawaban');

        if ($benar === null || (int) $data['captcha'] !== (int) $benar) {
            return redirect(route('berita.show', $berita) . '#komentar')
                ->withInput()
                ->withErrors(['captcha' => 'Jawaban captcha salah, silakan coba lagi.']);
        }

        $berita->komentars()->create([
            'nama'  => $data['nama'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'pesan' => $data['pesan'],
        ]);

        return redirect(route('berita.show', $berita) . '#komentar')
            ->with('komentar_sukses', 'Komentar Anda berhasil dikirim. Terima kasih!');
    }
}