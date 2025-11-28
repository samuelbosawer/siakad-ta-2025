<?php

use App\Http\Controllers\Admin\FormMagangController as FormMagang;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(FormMagang::class)->group(function(){
        Route::get('form-magang', [FormMagang::class, 'index'])->name('form-magang');
        Route::get('form-magang/tambah', [FormMagang::class, 'create'])->name('form-magang.tambah');
        Route::get('form-magang/detail/{id}', [FormMagang::class, 'show'])->name('form-magang.detail');
        Route::delete('form-magang/{id}', [FormMagang::class, 'destroy'])->name('form-magang.hapus');
        Route::post('form-magang/store', [FormMagang::class, 'store'])->name('form-magang.store');
        Route::get('form-magang/{id}/ubah', [FormMagang::class, 'edit'])->name('form-magang.ubah');
        Route::put('form-magang/{id}', [FormMagang::class, 'update'])->name('form-magang.update');
    });
});
