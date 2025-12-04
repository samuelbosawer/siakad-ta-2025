<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sejarah', [App\Http\Controllers\HomeController::class, 'sejarah'])->name('sejarah');
Route::get('/visi-misi', [App\Http\Controllers\HomeController::class, 'visi_misi'])->name('visi_misi');
Route::get('/struktur', [App\Http\Controllers\HomeController::class, 'struktur'])->name('struktur');
Route::get('/dosen', [App\Http\Controllers\HomeController::class, 'dosen'])->name('dosen');
Route::get('/pengumuman', [App\Http\Controllers\HomeController::class, 'pengumuman'])->name('pengumuman');
require_once 'admin.php';
