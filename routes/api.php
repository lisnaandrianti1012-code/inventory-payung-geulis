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
/*
|--------------------------------------------------------------------------
| SERVE IMAGES WITH CORS HEADERS FOR FLUTTER
|--------------------------------------------------------------------------
*/
Route::get('/gambar/{filename}', function ($filename) {
    $path = storage_path('app/public/produk_customer/' . $filename);
    if (!file_exists($path)) {
        abort(404);
    }
    $file = file_get_contents($path);
    $type = mime_content_type($path);
    return response($file, 200)
        ->header('Content-Type', $type)
        ->header('Access-Control-Allow-Origin', '*');
});
