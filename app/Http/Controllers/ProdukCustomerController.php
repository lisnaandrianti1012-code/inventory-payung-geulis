<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukCustomer;

class ProdukCustomerController
extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $produk = ProdukCustomer::latest()->get();

        return view(
            'produk_customer.index',
            compact('produk')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view(
            'produk_customer.create'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'nama_produk' => 'required',

            'harga' => 'required',

            'stok' => 'required',

            'deskripsi' => 'required',

            'gambar' => 'required|image',

        ]);

        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        */

        $gambar = $request->file('gambar')
                          ->store(
                              'produk_customer',
                              'public'
                          );

        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATABASE
        |--------------------------------------------------------------------------
        */

        ProdukCustomer::create([

            'nama_produk' =>
            $request->nama_produk,

            'harga' =>
            $request->harga,

            'stok' =>
            $request->stok,

            'deskripsi' =>
            $request->deskripsi,

            'gambar' =>
            $gambar,

        ]);

        return redirect(
            '/produk-customer'
        )->with(

            'success',
            'Produk customer berhasil ditambahkan'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $produk =
        ProdukCustomer::findOrFail($id);

        return view(
            'produk_customer.edit',
            compact('produk')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        $id
    ){

        $produk =
        ProdukCustomer::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | CEK GAMBAR
        |--------------------------------------------------------------------------
        */

        if($request->hasFile('gambar')){

            $gambar = $request
                ->file('gambar')
                ->store(
                    'produk_customer',
                    'public'
                );

        }else{

            $gambar = $produk->gambar;
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $produk->update([

            'nama_produk' =>
            $request->nama_produk,

            'harga' =>
            $request->harga,

            'stok' =>
            $request->stok,

            'deskripsi' =>
            $request->deskripsi,

            'gambar' =>
            $gambar,

        ]);

        return redirect(
            '/produk-customer'
        )->with(

            'success',
            'Produk berhasil diupdate'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $produk =
        ProdukCustomer::findOrFail($id);

        $produk->delete();

        return redirect(
            '/produk-customer'
        )->with(

            'success',
            'Produk berhasil dihapus'
        );
    }
}