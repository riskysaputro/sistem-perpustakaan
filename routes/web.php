<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('Admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    // Route Anggota
    Route::get('/kelola-anggota', action: [AnggotaController::class, 'index'])->name('anggota.index');
    Route::post('/kelola-anggota', action: [AnggotaController::class, 'store'])->name('anggota.store');

    // Route Buku
     Route::get('/buku', action: [BukuController::class, 'index'])->name('buku.index');
    Route::post('/buku', action: [BukuController::class, 'store'])->name('buku.store');

    // Route Kategori
     Route::get('/kategori', action: [KategoriBukuController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', action: [KategoriBukuController::class, 'store'])->name('kategori.store');
    Route::delete('/kategori/{id}', action: [KategoriBukuController::class, 'destroy'])->name('kategori.destroy');
    Route::patch('/kategori/{id}', action: [KategoriBukuController::class, 'update'])->name('kategori.update');

    // Route Pemijaman
     Route::get('/peminjaman', action: [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::post('/peminjaman', action: [PeminjamanController::class, 'store'])->name('peminjaman.store');

    // Route Kategori
     Route::get('/denda', action: [DendaController::class, 'index'])->name('denda.index');
    Route::post('/denda', action: [DendaController::class, 'store'])->name('denda.store');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::resource('peminjaman', PeminjamanController::class)->except(['edit', 'update', 'show']);
Route::get('/peminjaman/export/pdf', [PeminjamanController::class, 'exportPdf'])->name('peminjaman.export.pdf');

});
require __DIR__.'/auth.php';