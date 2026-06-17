<?php

namespace App\Http\Controllers;

use App\Models\ProdukCustomer;
use Illuminate\Http\Request;

class ProdukCustomerController extends Controller
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
        return view('produk_customer.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|max:255',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
            'deskripsi'   => 'required',
            'gambar'      => 'required|image|mimes:jpg,jpeg,png'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload Gambar
        |--------------------------------------------------------------------------
        */

        $gambar = $request->file('gambar')->store(
            'produk_customer',
            'public'
        );

        /*
        |--------------------------------------------------------------------------
        | Simpan Data
        |--------------------------------------------------------------------------
        */

        ProdukCustomer::create([
            'nama_produk' => $request->nama_produk,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'deskripsi'   => $request->deskripsi,
            'gambar'      => $gambar
        ]);

        return redirect()
            ->route('produk-customer.index')
            ->with(
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
        $produk = ProdukCustomer::findOrFail($id);

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
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|max:255',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
            'deskripsi'   => 'required'
        ]);

        $produk = ProdukCustomer::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Upload Gambar Baru
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar')->store(
                'produk_customer',
                'public'
            );

        } else {

            $gambar = $produk->gambar;

        }

        /*
        |--------------------------------------------------------------------------
        | Update Data
        |--------------------------------------------------------------------------
        */

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'deskripsi'   => $request->deskripsi,
            'gambar'      => $gambar
        ]);

        return redirect()
            ->route('produk-customer.index')
            ->with(
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
        $produk = ProdukCustomer::findOrFail($id);

        $produk->delete();

        return redirect()
            ->route('produk-customer.index')
            ->with(
                'success',
                'Produk berhasil dihapus'
            );
    }
}

