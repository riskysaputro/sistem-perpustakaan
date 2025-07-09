<?php

use App\Http\Controllers\{
UserController,
BukuController,
KategoriBukuController,
AnggotaController,
DendaController,
PeminjamanController,
DetailPinjamController
};
use Illuminate\Support\Facades\Route;

Route::apiResources([
'users' => UserController::class,
'bukus' => BukuController::class,
'kategori-bukus' => KategoriBukuController::class,
'anggotas' => AnggotaController::class,
'dendas' => DendaController::class,
'peminjamans' => PeminjamanController::class,
'detail-pinjam' => DetailPinjamController::class,
]);
