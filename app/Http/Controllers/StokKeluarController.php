<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\StokKeluar;
use App\Models\ActivityLog;

class StokKeluarController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {

        $search = $request->search;

        $stokKeluar = StokKeluar::with('produk')

            ->whereHas(
                'produk',
                function($query) use ($search){

                    $query->where(
                        'nama_produk',
                        'like',
                        '%'.$search.'%'
                    );

                }
            )

            ->latest()
            ->paginate(8);

        return view(
            'stok_keluar.index',
            compact(
                'stokKeluar',
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

        $produk = Produk::all();

        return view(
            'stok_keluar.create',
            compact('produk')
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

            'produk_id' =>
                'required',

            'jumlah' =>
                'required|numeric|min:1',

            'tanggal' =>
                'required',

            'tujuan' =>
                'required|max:255'

        ]);

        /*
        |--------------------------------------------------------------------------
        | AMBIL PRODUK
        |--------------------------------------------------------------------------
        */

        $produk = Produk::find(
            $request->produk_id
        );

        /*
        |--------------------------------------------------------------------------
        | VALIDASI STOK
        |--------------------------------------------------------------------------
        */

        if(
            $request->jumlah >
            $produk->stok
        ){

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Stok tidak mencukupi'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN STOK KELUAR
        |--------------------------------------------------------------------------
        */

        StokKeluar::create([

            'produk_id' =>
                $request->produk_id,

            'jumlah' =>
                $request->jumlah,

            'tanggal' =>
                $request->tanggal,

            'tujuan' =>
                $request->tujuan

        ]);

        /*
        |--------------------------------------------------------------------------
        | KURANGI STOK
        |--------------------------------------------------------------------------
        */

        $produk->stok -=
            $request->jumlah;

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
                'Mengeluarkan stok produk '
                .$produk->nama_produk.
                ' sebanyak '.
                $request->jumlah.
                ' unit'

        ]);

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect(
            '/stok-keluar'
        )->with(
            'success',
            'Stok keluar berhasil ditambahkan'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {

        $stokKeluar = StokKeluar::find($id);

        /*
        |--------------------------------------------------------------------------
        | KEMBALIKAN STOK
        |--------------------------------------------------------------------------
        */

        $produk = Produk::find(
            $stokKeluar->produk_id
        );

        $produk->stok +=
            $stokKeluar->jumlah;

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
                'Menghapus stok keluar produk '
                .$produk->nama_produk

        ]);

        /*
        |--------------------------------------------------------------------------
        | HAPUS DATA
        |--------------------------------------------------------------------------
        */

        $stokKeluar->delete();

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect(
            '/stok-keluar'
        )->with(
            'success',
            'Data berhasil dihapus'
        );
    }
}