<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Api\ProdukApiController;
use App\Http\Controllers\Api\ProdukCustomerApiController;
use App\Http\Controllers\Api\SupplierApiController;
use App\Http\Controllers\Api\StokMasukApiController;
use App\Http\Controllers\Api\StokKeluarApiController;
use App\Http\Controllers\Api\LaporanApiController;
use App\Http\Controllers\Api\PesananApiController;

/*
|--------------------------------------------------------------------------
| PRODUK INVENTORY
|--------------------------------------------------------------------------
*/

Route::get(
    '/produk',
    [ProdukApiController::class, 'index']
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
| SUPPLIER
|--------------------------------------------------------------------------
*/

Route::get(
    '/supplier',
    [SupplierApiController::class, 'index']
);

/*
|--------------------------------------------------------------------------
| PENERIMAAN BARANG
|--------------------------------------------------------------------------
*/

Route::get(
    '/stok-masuk',
    [StokMasukApiController::class, 'index']
);

/*
|--------------------------------------------------------------------------
| DISTRIBUSI BARANG
|--------------------------------------------------------------------------
*/

Route::get(
    '/stok-keluar',
    [StokKeluarApiController::class, 'index']
);

/*
|--------------------------------------------------------------------------
| LAPORAN
|--------------------------------------------------------------------------
*/

Route::get(
    '/laporan',
    [LaporanApiController::class, 'index']
);

/*
|--------------------------------------------------------------------------
| PESANAN CUSTOMER
|--------------------------------------------------------------------------
*/

Route::get(
    '/pesanan',
    [PesananApiController::class, 'index']
);

/*
|--------------------------------------------------------------------------
| CHECKOUT FLUTTER USER
|--------------------------------------------------------------------------
*/

Route::post(
    '/checkout',
    [PesananApiController::class, 'store']
);

/*
|--------------------------------------------------------------------------
| UPDATE STATUS PESANAN
|--------------------------------------------------------------------------
*/

Route::post(
    '/pesanan/status/{id}',
    [PesananApiController::class, 'updateStatus']
);

/*
|--------------------------------------------------------------------------
| DETAIL PESANAN
|--------------------------------------------------------------------------
*/

Route::get(
    '/pesanan/{id}',
    [PesananApiController::class, 'show']
);

/*
|--------------------------------------------------------------------------
| DELETE PESANAN
|--------------------------------------------------------------------------
*/

Route::delete(
    '/pesanan/{id}',
    [PesananApiController::class, 'destroy']
);

/*
|--------------------------------------------------------------------------
| USER LOGIN API
|--------------------------------------------------------------------------
*/

Route::post(
    '/login',
    function(Request $request){

        return response()->json([

            'success' => true,

            'message' => 'Login berhasil',

            'user' => [

                'email' => $request->email

            ]

        ]);
    }
);

/*
|--------------------------------------------------------------------------
| TEST API
|--------------------------------------------------------------------------
*/

Route::get(
    '/test',
    function(){

        return response()->json([

            'success' => true,

            'message' => 'API Payung Geulis berjalan'

        ]);
    }
);