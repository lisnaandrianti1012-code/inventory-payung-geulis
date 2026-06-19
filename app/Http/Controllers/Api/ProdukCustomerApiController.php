<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProdukCustomer;

class ProdukCustomerApiController extends Controller
{
    public function index()
    {
        $produk = ProdukCustomer::latest()->get();

        foreach ($produk as $item) {
            if ($item->gambar && !str_starts_with($item->gambar, 'http')) {
                $item->gambar = url('api/gambar/' . basename($item->gambar));
            }
        }

        return response()->json([
            'success' => true,
            'data' => $produk
        ]);
    }
}
