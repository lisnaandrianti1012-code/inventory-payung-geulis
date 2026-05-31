<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\ActivityLog;

class ProdukController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {

        $search = $request->search;

        $produk = Produk::where(
                    'nama_produk',
                    'like',
                    '%'.$search.'%'
                )
                ->latest()
                ->paginate(8);

        return view(
            'produk.index',
            compact(
                'produk',
                'search'
            )
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
            'produk.create'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {

        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'nama_produk' =>
                'required|max:255',

            'kategori' =>
                'required|max:255',

            'harga' =>
                'required|numeric',

            'stok' =>
                'required|numeric',

            'gambar' =>
                'required|image|mimes:jpg,jpeg,png'

        ]);

        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        */

        $gambar = time().'.'.$request
                    ->gambar
                    ->extension();

        $request->gambar->move(
            public_path('gambar'),
            $gambar
        );

        /*
        |--------------------------------------------------------------------------
        | SIMPAN PRODUK
        |--------------------------------------------------------------------------
        */

        Produk::create([

            'nama_produk' =>
                $request->nama_produk,

            'kategori' =>
                $request->kategori,

            'harga' =>
                $request->harga,

            'stok' =>
                $request->stok,

            'gambar' =>
                $gambar

        ]);

        /*
        |--------------------------------------------------------------------------
        | ACTIVITY LOG
        |--------------------------------------------------------------------------
        */

        ActivityLog::create([

            'user' =>
                auth()->user()->name,

            'aktivitas' =>
                'Menambahkan produk '
                .$request->nama_produk

        ]);

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect(
            '/produk'
        )->with(
            'success',
            'Produk berhasil ditambahkan'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {

        $produk = Produk::find($id);

        return view(
            'produk.edit',
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

        $produk = Produk::find($id);

        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'nama_produk' =>
                'required|max:255',

            'kategori' =>
                'required|max:255',

            'harga' =>
                'required|numeric',

            'stok' =>
                'required|numeric'

        ]);

        /*
        |--------------------------------------------------------------------------
        | UPDATE GAMBAR
        |--------------------------------------------------------------------------
        */

        if($request->gambar){

            $gambar = time().'.'.$request
                        ->gambar
                        ->extension();

            $request->gambar->move(
                public_path('gambar'),
                $gambar
            );

            $produk->gambar = $gambar;
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA
        |--------------------------------------------------------------------------
        */

        $produk->nama_produk =
            $request->nama_produk;

        $produk->kategori =
            $request->kategori;

        $produk->harga =
            $request->harga;

        $produk->stok =
            $request->stok;

        $produk->save();

        /*
        |--------------------------------------------------------------------------
        | ACTIVITY LOG
        |--------------------------------------------------------------------------
        */

        ActivityLog::create([

            'user' =>
                auth()->user()->name,

            'aktivitas' =>
                'Mengedit produk '
                .$produk->nama_produk

        ]);

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect(
            '/produk'
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

        $produk = Produk::find($id);

        /*
        |--------------------------------------------------------------------------
        | ACTIVITY LOG
        |--------------------------------------------------------------------------
        */

        ActivityLog::create([

            'user' =>
                auth()->user()->name,

            'aktivitas' =>
                'Menghapus produk '
                .$produk->nama_produk

        ]);

        /*
        |--------------------------------------------------------------------------
        | HAPUS PRODUK
        |--------------------------------------------------------------------------
        */

        $produk->delete();

        return redirect(
            '/produk'
        )->with(
            'success',
            'Produk berhasil dihapus'
        );
    }
}