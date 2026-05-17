<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StokMasuk;

class StokMasukApiController extends Controller
{

    public function index()
    {

        $stokMasuk = StokMasuk::with('produk')->get();

        return response()->json([

            'success' => true,

            'data' => $stokMasuk

        ]);
    }
}