<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananApiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GET PESANAN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $pesanan = Pesanan::latest()->get();

        return response()->json([

            'success' => true,

            'data' => $pesanan

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | CHECKOUT
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
{
    $pesanan = Pesanan::create([

        'nama_customer' => $request->nama_customer,

        'produk' => $request->produk,

        'jumlah' => $request->jumlah,

        'total_harga' => $request->total_harga,

        'alamat' => $request->alamat,

        'status' => 'Pending'

    ]);

    return response()->json([

        'success' => true,

        'message' => 'Checkout berhasil',

        'data' => $pesanan

    ]);
}
    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        Pesanan::find($id)->delete();

        return response()->json([

            'success' => true

        ]);
    }
}