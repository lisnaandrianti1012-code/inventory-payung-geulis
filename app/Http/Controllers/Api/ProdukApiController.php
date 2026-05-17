<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;

class ProdukApiController extends Controller
{

    public function index()
    {

        $produk = Produk::all();

        return response()->json([

            'success' => true,

            'message' => 'Data Produk',

            'data' => $produk

        ]);
    }
}