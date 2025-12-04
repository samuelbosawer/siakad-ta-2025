<?php

use App\Http\Controllers\Admin\FormKknController as Formkkn;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(Formkkn::class)->group(function(){
        Route::get('form-kkn', [Formkkn::class, 'index'])->name('form-kkn');
        Route::get('form-kkn/tambah', [Formkkn::class, 'create'])->name('form-kkn.tambah')->middleware(['auth','role.custom:adminprodi|mahasiswa']);
        Route::get('form-kkn/detail/{id}', [Formkkn::class, 'show'])->name('form-kkn.detail')->middleware(['auth','role.custom:adminprodi|mahasiswa']);
        Route::delete('form-kkn/{id}', [Formkkn::class, 'destroy'])->name('form-kkn.hapus')->middleware(['auth','role.custom:adminprodi']);
        Route::post('form-kkn/store', [Formkkn::class, 'store'])->name('form-kkn.store')->middleware(['auth','role.custom:adminprodi|mahasiswa']);
        Route::get('form-kkn/{id}/ubah', [Formkkn::class, 'edit'])->name('form-kkn.ubah')->middleware(['auth','role.custom:adminprodi']);
        Route::put('form-kkn/{id}', [Formkkn::class, 'update'])->name('form-kkn.update')->middleware(['auth','role.custom:adminprodi']);
    });
});
