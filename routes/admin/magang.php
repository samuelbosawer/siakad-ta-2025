<?php

use App\Http\Controllers\Admin\MagangController as Magang;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(Magang::class)->group(function(){
        Route::get('magang', [Magang::class, 'index'])->name('magang')->middleware(['auth','role.custom:adminprodi|mahasiswa']);
        Route::get('magang/tambah', [Magang::class, 'create'])->name('magang.tambah')->middleware(['auth','role.custom:adminprodi']);
        Route::get('magang/detail/{id}', [Magang::class, 'show'])->name('magang.detail')->middleware(['auth','role.custom:adminprodi|mahasiswa']);
        Route::delete('magang/{id}', [Magang::class, 'destroy'])->name('magang.hapus')->middleware(['auth','role.custom:adminprodi']);
        Route::post('magang/store', [Magang::class, 'store'])->name('magang.store')->middleware(['auth','role.custom:adminprodi']);
        Route::get('magang/{id}/ubah', [Magang::class, 'edit'])->name('magang.ubah')->middleware(['auth','role.custom:adminprodi']);
        Route::put('magang/{id}', [Magang::class, 'update'])->name('magang.update')->middleware(['auth','role.custom:adminprodi']);
    });
});
