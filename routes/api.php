<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProdukApiController;
use App\Http\Controllers\Api\StokMasukApiController;
use App\Http\Controllers\Api\StokKeluarApiController;
use App\Http\Controllers\Api\LaporanApiController;

Route::get(
    '/produk',
    [ProdukApiController::class, 'index']
);

Route::get(
    '/stok-masuk',
    [StokMasukApiController::class, 'index']
);

Route::get(
    '/stok-keluar',
    [StokKeluarApiController::class, 'index']
);

Route::get(
    '/laporan',
    [LaporanApiController::class, 'index']
);