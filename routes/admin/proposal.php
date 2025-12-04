<?php

use App\Http\Controllers\Admin\ProposalController as Proposal;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(Proposal::class)->group(function(){
        Route::get('proposal', [Proposal::class, 'index'])->name('proposal');
        Route::get('proposal/tambah', [Proposal::class, 'create'])->name('proposal.tambah')->middleware(['auth','role.custom:adminprodi|mahasiswa']);
        Route::get('proposal/detail/{id}', [Proposal::class, 'show'])->name('proposal.detail');
        Route::delete('proposal/{id}', [Proposal::class, 'destroy'])->name('proposal.hapus')->middleware(['auth','role.custom:adminprodi']);
        Route::post('proposal/store', [Proposal::class, 'store'])->name('proposal.store')->middleware(['auth','role.custom:adminprodi|mahasiswa']);
        Route::get('proposal/{id}/ubah', [Proposal::class, 'edit'])->name('proposal.ubah')->middleware(['auth','role.custom:adminprodi|dosen']);
        Route::put('proposal/{id}', [Proposal::class, 'update'])->name('proposal.update')->middleware(['auth','role.custom:adminprodi|dosen']);
    });
});
