<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Models\Jurusan;

// Redirect awal ke halaman login
Route::get('/', fn () => redirect()->route('login'));

// Auth Laravel Breeze
require __DIR__ . '/auth.php';

// ==============================
// Dashboard Berdasarkan Peran
// ==============================
Route::get('/dashboard', function () {
    $user = Auth::user();
    return match ($user->peran) {
        'admin' => app(AdminController::class)->dashboard(),
        'siswa' => view('siswa.dashboard', ['jurusans' => Jurusan::all()]),
        default => abort(403, 'Peran tidak dikenal.')
    };
})->middleware('auth')->name('dashboard');

// ==============================
// Profil Pengguna
// ==============================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==============================
// ROUTE SISWA
// ==============================
Route::middleware('auth')->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/form', [SiswaController::class, 'tampilForm'])->name('form');
    Route::get('/form/kembali', [SiswaController::class, 'kembaliHalaman'])->name('kembaliHalaman');
    Route::post('/biodata', [SiswaController::class, 'simpanBiodata'])->name('kirimBiodata');
    Route::post('/jawaban-perhalaman', [SiswaController::class, 'kirimJawabanPerHalaman'])->name('kirimJawabanPerHalaman');
    Route::post('/form', [SiswaController::class, 'kirimJawabanPerHalaman'])->name('kirimJawaban');
    Route::get('/form/slide/{page?}', [SiswaController::class, 'tampilForm'])->name('form.slide');
    Route::get('/jurusan/{id}', [SiswaController::class, 'jurusanDetail'])->name('jurusanDetail');
});

// ==============================
// ROUTE ADMIN
// ==============================
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Grafik Jumlah Siswa Per Jurusan
    Route::get('/grafik-data', [AdminController::class, 'grafikData'])->name('grafikData');

    // Kelola Jurusan
    Route::get('/jurusan', [AdminController::class, 'kelolaJurusan'])->name('kelolaJurusan');
    Route::post('/jurusan', [AdminController::class, 'simpanJurusan'])->name('simpanJurusan');
    Route::get('/jurusan/{id}', [AdminController::class, 'jurusanDetail'])->name('jurusanDetail');
    Route::get('/jurusan/{id}/edit', [AdminController::class, 'editJurusan'])->name('editJurusan');
    Route::match(['put', 'post'], '/jurusan/{id}/update', [AdminController::class, 'updateJurusan'])->name('updateJurusan');
    Route::post('/jurusan/{id}/hapus', [AdminController::class, 'hapusJurusan'])->name('hapusJurusan');

    // Kelola Pertanyaan
    Route::get('/pertanyaan', [AdminController::class, 'kelolaPertanyaan'])->name('kelolaPertanyaan');
    Route::post('/pertanyaan', [AdminController::class, 'simpanPertanyaan'])->name('simpanPertanyaan');
    Route::get('/pertanyaan/{id}/edit', [AdminController::class, 'editPertanyaan'])->name('editPertanyaan');
    Route::match(['put', 'post'], '/pertanyaan/{id}', [AdminController::class, 'updatePertanyaan'])->name('updatePertanyaan');
    Route::post('/pertanyaan/{id}/hapus', [AdminController::class, 'hapusPertanyaan'])->name('hapusPertanyaan');
    
    // Hasil Rekomendasi
    Route::get('/rekomendasi', [AdminController::class, 'hasilRekomendasi'])->name('hasilRekomendasi');
});
