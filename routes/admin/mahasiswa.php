<?php

use App\Http\Controllers\Admin\MahasiswaController as Mahasiswa;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(Mahasiswa::class)->group(function(){
        Route::get('mahasiswa', [Mahasiswa::class, 'index'])->name('mahasiswa')->middleware(['auth','role.custom:mahasiswa|adminprodi']);
        Route::get('mahasiswa/tambah', [Mahasiswa::class, 'create'])->name('mahasiswa.tambah')->middleware(['auth','role.custom:adminprodi']);
        Route::get('mahasiswa/detail/{id}', [Mahasiswa::class, 'show'])->name('mahasiswa.detail')->middleware(['auth','role.custom:mahasiswa}adminprodi']);
        Route::delete('mahasiswa/{id}', [Mahasiswa::class, 'destroy'])->name('mahasiswa.hapus')->middleware(['auth','role.custom:adminprodi']);
        Route::post('mahasiswa/store', [Mahasiswa::class, 'store'])->name('mahasiswa.store')->middleware(['auth','role.custom:adminprodi']);
        Route::get('mahasiswa/{id}/ubah', [Mahasiswa::class, 'edit'])->name('mahasiswa.ubah')->middleware(['auth','role.custom:adminprodi']);
        Route::put('mahasiswa/{id}', [Mahasiswa::class, 'update'])->name('mahasiswa.update')->middleware(['auth','role.custom:adminprodi']);
    });
});
