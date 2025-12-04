<?php

use App\Http\Controllers\Admin\KknController as Kkn;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(Kkn::class)->group(function(){
        Route::get('kkn', [Kkn::class, 'index'])->name('kkn')->middleware(['auth','role.custom:adminprodi|mahasiswa']);
        Route::get('kkn/tambah', [Kkn::class, 'create'])->name('kkn.tambah')->middleware(['auth','role.custom:adminprodi']);
        Route::get('kkn/detail/{id}', [Kkn::class, 'show'])->name('kkn.detail')->middleware(['auth','role.custom:adminprodi|mahasiswa']);
        Route::delete('kkn/{id}', [Kkn::class, 'destroy'])->name('kkn.hapus')->middleware(['auth','role.custom:adminprodi']);
        Route::post('kkn/store', [Kkn::class, 'store'])->name('kkn.store')->middleware(['auth','role.custom:adminprodi']);
        Route::get('kkn/{id}/ubah', [Kkn::class, 'edit'])->name('kkn.ubah')->middleware(['auth','role.custom:adminprodi']);
        Route::put('kkn/{id}', [Kkn::class, 'update'])->name('kkn.update')->middleware(['auth','role.custom:adminprodi']);
    });
});
