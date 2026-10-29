<?php

use Illuminate\Support\Facades\Route;

// ================= AUTH =================
use App\Http\Controllers\AuthController;

// ================= ADMIN =================
use App\Http\Controllers\Admin\AdminPoliController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\ObatController;

// ================= DOKTER =================
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\PeriksaPasienController;
use App\Http\Controllers\Dokter\RiwayatPasienController;

// ================= PASIEN =================
use App\Http\Controllers\Pasien\PoliController;


// ================= HALAMAN UTAMA =================

Route::get('/', function () {
    return view('welcome');
});


// ================= AUTHENTICATION =================

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ================= ADMIN =================

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        // CRUD Poli
        Route::resource('polis', AdminPoliController::class);

        // CRUD Dokter
        Route::resource('dokter', DokterController::class);

        // CRUD Pasien
        Route::resource('pasien', PasienController::class);

        // CRUD Obat
        Route::resource('obat', ObatController::class);
    });


// ================= DOKTER =================

Route::middleware(['auth', 'role:dokter'])
    ->prefix('dokter')
    ->group(function () {

        // Dashboard Dokter
        Route::get('/dashboard', function () {
            return view('dokter.dashboard');
        })->name('dokter.dashboard');

        // CRUD Jadwal Periksa
        Route::resource('jadwal-periksa', JadwalPeriksaController::class);

        // Pemeriksaan Pasien
        Route::get('/periksa-pasien', [PeriksaPasienController::class, 'index'])
            ->name('periksa-pasien.index');

        Route::post('/periksa-pasien', [PeriksaPasienController::class, 'store'])
            ->name('periksa-pasien.store');

        Route::get('/periksa-pasien/{id}', [PeriksaPasienController::class, 'create'])
            ->name('periksa-pasien.create');

        // Riwayat Pasien
        Route::get('/riwayat-pasien', [RiwayatPasienController::class, 'index'])
            ->name('riwayat-pasien.index');

        Route::get('/riwayat-pasien/{id}', [RiwayatPasienController::class, 'show'])
            ->name('riwayat-pasien.show');
    });


// ================= PASIEN =================

Route::middleware(['auth', 'role:pasien'])
    ->prefix('pasien')
    ->group(function () {

        // Dashboard Pasien
        Route::get('/dashboard', function () {
            return view('pasien.dashboard');
        })->name('pasien.dashboard');

        // Pendaftaran Poli
        Route::get('/daftar', [PoliController::class, 'get'])
            ->name('pasien.daftar');

        Route::post('/daftar', [PoliController::class, 'submit'])
            ->name('pasien.daftar.submit');
    });