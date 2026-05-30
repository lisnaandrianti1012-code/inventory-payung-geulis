<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProdukCustomer;

class ProdukCustomerApiController extends Controller
{
    public function index()
    {
        $produk = ProdukCustomer::all();

        return response()->json([
            'success' => true,
            'message' => 'Data Produk Customer',
            'data' => $produk
        ]);
    }
}