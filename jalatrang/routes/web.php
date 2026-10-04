<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KomentarController;

Route::get('/', function () {
    return redirect()->route('berita.index');
});

Route::resource('berita', BeritaController::class)
    ->parameters(['berita' => 'berita']);

    // Komentar & captcha
Route::get('captcha-baru', [KomentarController::class, 'captcha'])->name('captcha.baru');
Route::post('berita/{berita}/komentar', [KomentarController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('komentar.store');  