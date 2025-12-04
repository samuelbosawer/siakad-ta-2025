<?php

use App\Http\Controllers\Admin\SkripsiController as Skripsi;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(Skripsi::class)->group(function(){
        Route::get('skripsi', [Skripsi::class, 'index'])->name('skripsi');
        Route::get('skripsi/tambah', [Skripsi::class, 'create'])->name('skripsi.tambah')->middleware(['auth','role.custom:adminprodi|mahasiswa']);
        Route::get('skripsi/detail/{id}', [Skripsi::class, 'show'])->name('skripsi.detail')->middleware(['auth','role.custom:adminprodi|mahasiswa|dosen']);
        Route::delete('skripsi/{id}', [Skripsi::class, 'destroy'])->name('skripsi.hapus')->middleware(['auth','role.custom:adminprodi']);
        Route::post('skripsi/store', [Skripsi::class, 'store'])->name('skripsi.store')->middleware(['auth','role.custom:adminprodi|mahasiswa']);
        Route::get('skripsi/{id}/ubah', [Skripsi::class, 'edit'])->name('skripsi.ubah')->middleware(['auth','role.custom:adminprodi|dosen']);
        Route::put('skripsi/{id}', [Skripsi::class, 'update'])->name('skripsi.update')->middleware(['auth','role.custom:adminprodi|dosen']);
    });
});
// ->middleware(['auth','role.custom:adminprodi|mahasiswa']);