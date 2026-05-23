<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukCustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StokMasukController;
use App\Http\Controllers\StokKeluarController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| REDIRECT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect('/login');

});

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | REALTIME AJAX
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard/realtime',
        [DashboardController::class, 'realtime']
    );

});

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::controller(
        ProfileController::class
    )->group(function () {

        Route::get(
            '/profile',
            'edit'
        )->name('profile.edit');

        Route::patch(
            '/profile',
            'update'
        )->name('profile.update');

        Route::delete(
            '/profile',
            'destroy'
        )->name('profile.destroy');

    });

});

/*
|--------------------------------------------------------------------------
| ADMIN + OWNER
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:admin,owner'
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PRODUK INVENTORY
    |--------------------------------------------------------------------------
    */

    Route::controller(
        ProdukController::class
    )->prefix('produk')->group(function () {

        Route::get('/', 'index');

        Route::get('/create', 'create');

        Route::post('/store', 'store');

        Route::get('/edit/{id}', 'edit');

        Route::post('/update/{id}', 'update');

        Route::get('/delete/{id}', 'destroy');

    });

    /*
    |--------------------------------------------------------------------------
    | PRODUK CUSTOMER
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'produk-customer',
        ProdukCustomerController::class
    );

    /*
    |--------------------------------------------------------------------------
    | SUPPLIER
    |--------------------------------------------------------------------------
    */

    Route::controller(
        SupplierController::class
    )->prefix('supplier')->group(function () {

        Route::get('/', 'index');

        Route::get('/create', 'create');

        Route::post('/store', 'store');

        Route::get('/edit/{id}', 'edit');

        Route::post('/update/{id}', 'update');

        Route::get('/delete/{id}', 'destroy');

    });

    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */

    Route::controller(
        LaporanController::class
    )->prefix('laporan')->group(function () {

        Route::get('/', 'index');

        Route::get('/pdf', 'pdf');

        Route::get('/excel', 'excel');

    });

});

/*
|--------------------------------------------------------------------------
| ADMIN + GUDANG
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:admin,gudang'
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PENERIMAAN BARANG
    |--------------------------------------------------------------------------
    */

    Route::controller(
        StokMasukController::class
    )->prefix('stok-masuk')->group(function () {

        Route::get('/', 'index');

        Route::get('/create', 'create');

        Route::post('/store', 'store');

        Route::get('/delete/{id}', 'destroy');

    });

    /*
    |--------------------------------------------------------------------------
    | DISTRIBUSI BARANG
    |--------------------------------------------------------------------------
    */

    Route::controller(
        StokKeluarController::class
    )->prefix('stok-keluar')->group(function () {

        Route::get('/', 'index');

        Route::get('/create', 'create');

        Route::post('/store', 'store');

        Route::get('/delete/{id}', 'destroy');

    });

});

/*
|--------------------------------------------------------------------------
| ADMIN + KASIR
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:admin,kasir'
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | CHECKOUT PENJUALAN
    |--------------------------------------------------------------------------
    */

    Route::controller(
        TransaksiController::class
    )->prefix('transaksi')->group(function () {

        Route::get('/', 'index');

        Route::get('/create', 'create');

        Route::post('/store', 'store');

        Route::get('/delete/{id}', 'destroy');

        /*
        |--------------------------------------------------------------------------
        | INVOICE
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/invoice/{id}',
            'invoice'
        );

    });

    /*
    |--------------------------------------------------------------------------
    | PESANAN CUSTOMER
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'pesanan',
        PesananController::class
    );

});

/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:admin'
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DATA PENGGUNA
    |--------------------------------------------------------------------------
    */

    Route::controller(
        UserController::class
    )->prefix('user')->group(function () {

        Route::get('/', 'index');

        Route::get('/create', 'create');

        Route::post('/store', 'store');

        Route::get('/edit/{id}', 'edit');

        Route::post('/update/{id}', 'update');

        Route::get('/delete/{id}', 'destroy');

    });

});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';