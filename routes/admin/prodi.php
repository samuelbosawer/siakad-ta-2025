<?php

use App\Http\Controllers\Admin\ProdiController as Prodi;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role.custom:adminprodi']], function () {

    Route::controller(Prodi::class)->group(function(){
        Route::get('prodi', [Prodi::class, 'index'])->name('prodi');
        Route::get('prodi/tambah', [Prodi::class, 'create'])->name('prodi.tambah');
        Route::get('prodi/{id}/ubah', [Prodi::class, 'edit'])->name('prodi.ubah');
        Route::put('prodi/{id}', [Prodi::class, 'update'])->name('prodi.update');
        Route::get('prodi/detail/{id}', [Prodi::class, 'show'])->name('prodi.detail');
        Route::delete('prodi/{id}', [Prodi::class, 'destroy'])->name('prodi.hapus');
        Route::post('prodi/store', [Prodi::class, 'store'])->name('prodi.store');
    
    });
});
