<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;

// Halaman login: hanya untuk pengguna yang belum login.
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');
});

// Halaman internal: hanya untuk pengguna yang sudah login.
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::resource('kelas', KelasController::class)
        ->parameters(['kelas' => 'kelas']);

    Route::resource('guru', GuruController::class)
        ->parameters(['guru' => 'guru']);

    Route::resource('mapel', MapelController::class)
        ->parameters(['mapel' => 'mapel']);

    Route::resource('siswa', SiswaController::class)
        ->parameters(['siswa' => 'siswa']);

    Route::resource('nilai', NilaiController::class)
        ->parameters(['nilai' => 'nilai']);
});
