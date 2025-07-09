<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController as AuthController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/logout', [AuthController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/login', [AuthController::class,'index'])->name('login');

// Profile (default Laravel Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// App routes
Route::middleware('auth')->group(function () {

    // Route Anggota
    Route::prefix('kelola-anggota')->name('anggota.')->group(function () {
        Route::get('/', [AnggotaController::class, 'index'])->name('index');
        Route::post('/', [AnggotaController::class, 'store'])->name('store');
        Route::patch('/update/{id}', [AnggotaController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AnggotaController::class, 'destroy'])->name('destroy');
    });

    // Route Buku
    Route::prefix('buku')->name('buku.')->group(function () {
        Route::get('/', [BukuController::class, 'index'])->name('index');
        Route::post('/', [BukuController::class, 'store'])->name('store');
        Route::patch('/update/{id}', [BukuController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BukuController::class, 'destroy'])->name('destroy');
    });

    // Route Kategori Buku
    Route::prefix('kategori')->name('kategori.')->group(function () {
        Route::get('/', [KategoriBukuController::class, 'index'])->name('index');
        Route::post('/', [KategoriBukuController::class, 'store'])->name('store');
        Route::patch('/{id}', [KategoriBukuController::class, 'update'])->name('update');
        Route::delete('/{id}', [KategoriBukuController::class, 'destroy'])->name('destroy');
    });

    // Route Peminjaman
    Route::prefix('peminjaman')->name('peminjaman.')->group(function () {
        Route::get('/', [PeminjamanController::class, 'index'])->name('index');
        Route::post('/', [PeminjamanController::class, 'store'])->name('store');
        Route::get('/create', [PeminjamanController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [PeminjamanController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [PeminjamanController::class, 'update'])->name('update');
        Route::patch('/update/{id}', [PeminjamanController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [PeminjamanController::class, 'destroy'])->name('destroy');

        // Route Buat Cetak PDF
        Route::get('/{id}/edit', [PeminjamanController::class, 'edit'])->name('edit');
        Route::get('/export/pdf', [PeminjamanController::class, 'exportPdf'])->name('export.pdf');
    });

    // Route Denda
    Route::prefix('denda')->name('denda.')->group(function () {
        Route::get('/', [DendaController::class, 'index'])->name('index');
        Route::post('/', [DendaController::class, 'store'])->name('store');
        Route::patch('/{id}', [DendaController::class, 'update'])->name('update');
        Route::delete('/{id}', [DendaController::class, 'destroy'])->name('destroy');
        });
    });

Route::fallback(function () {
    return redirect()->route('dashboard');
});

require __DIR__.'/auth.php';
