<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StokKeluar;

class StokKeluarApiController extends Controller
{

    public function index()
    {

        $stokKeluar = StokKeluar::with('produk')->get();

        return response()->json([

            'success' => true,

            'data' => $stokKeluar

        ]);
    }
}