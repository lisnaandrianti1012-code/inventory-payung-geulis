<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Produk;
use App\Models\StokMasuk;
use App\Models\StokKeluar;

class LaporanApiController extends Controller
{

    public function index()
    {

        return response()->json([

            'total_produk' =>
                Produk::count(),

            'total_stok' =>
                Produk::sum('stok'),

            'stok_masuk' =>
                StokMasuk::count(),

            'stok_keluar' =>
                StokKeluar::count(),

        ]);
    }
}