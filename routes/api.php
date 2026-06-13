<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProdukCustomerApiController;
use App\Http\Controllers\Api\PesananApiController;

/*
|--------------------------------------------------------------------------
| TEST API
|--------------------------------------------------------------------------
*/

Route::get('/test', function () {

    return response()->json([
        'success' => true,
        'message' => 'API Payung Geulis Berjalan'
    ]);

});

/*
|--------------------------------------------------------------------------
| REGISTER CUSTOMER
|--------------------------------------------------------------------------
*/

Route::post(
    '/register',
    [AuthController::class, 'register']
);

/*
|--------------------------------------------------------------------------
| LOGIN CUSTOMER
|--------------------------------------------------------------------------
*/

Route::post(
    '/login',
    [AuthController::class, 'login']
);

/*
|--------------------------------------------------------------------------
| PRODUK CUSTOMER
|--------------------------------------------------------------------------
*/

Route::get(
    '/produk-customer',
    [ProdukCustomerApiController::class, 'index']
);

/*
|--------------------------------------------------------------------------
| PESANAN CUSTOMER
|--------------------------------------------------------------------------
*/

Route::get(
    '/pesanan-customer',
    [PesananApiController::class, 'index']
);

/*
|--------------------------------------------------------------------------
| CHECKOUT CUSTOMER
|--------------------------------------------------------------------------
*/

Route::post(
    '/checkout',
    [PesananApiController::class, 'store']
);