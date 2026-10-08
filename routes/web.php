<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;

Route::get('/', function () {
    return view('dashboard.index');
});

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