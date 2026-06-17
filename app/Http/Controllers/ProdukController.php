<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | API UNTUK FLUTTER
    |--------------------------------------------------------------------------
    */
    public function apiProduk()
    {
        $produk = Produk::latest()->get();

        foreach ($produk as $item) {
            $item->gambar = url('gambar/' . $item->gambar);
        }

        return response()->json($produk);
    }

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
            '%' . $search . '%'
        )
        ->latest()
        ->paginate(8);

        return view(
            'produk.index',
            compact('produk', 'search')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('produk.create');
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
            'kategori' => 'required|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $gambar = time() . '.' . $request->gambar->extension();

        $request->gambar->move(
            public_path('gambar'),
            $gambar
        );

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'kategori'    => $request->kategori,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'gambar'      => $gambar
        ]);

        ActivityLog::create([
            'user'      => auth()->user()->name,
            'aktivitas' => 'Menambahkan produk ' . $request->nama_produk
        ]);

        return redirect('/produk')
            ->with(
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
        $produk = Produk::findOrFail($id);

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
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|max:255',
            'kategori'    => 'required|max:255',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric'
        ]);

        if ($request->hasFile('gambar')) {

            $gambar = time() . '.' . $request->gambar->extension();

            $request->gambar->move(
                public_path('gambar'),
                $gambar
            );

            $produk->gambar = $gambar;
        }

        $produk->nama_produk = $request->nama_produk;
        $produk->kategori = $request->kategori;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;

        $produk->save();

        ActivityLog::create([
            'user'      => auth()->user()->name,
            'aktivitas' => 'Mengedit produk ' . $produk->nama_produk
        ]);

        return redirect('/produk')
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
        $produk = Produk::findOrFail($id);

        ActivityLog::create([
            'user'      => auth()->user()->name,
            'aktivitas' => 'Menghapus produk ' . $produk->nama_produk
        ]);

        $produk->delete();

        return redirect('/produk')
            ->with(
                'success',
                'Produk berhasil dihapus'
            );
    }
}
