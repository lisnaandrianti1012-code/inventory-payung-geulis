<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\ActivityLog;

class TransaksiController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {

        $search = $request->search;

        $transaksi = Transaksi::with(
                'produk'
            )
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
            ->orWhere(
                'nama_pembeli',
                'like',
                '%'.$search.'%'
            )
            ->latest()
            ->paginate(8);

        return view(
            'transaksi.index',
            compact(
                'transaksi',
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
            'transaksi.create',
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

            'nama_pembeli' =>
                'required|max:255',

            'jumlah' =>
                'required|numeric|min:1',

            'tanggal' =>
                'required'

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
        | HITUNG TOTAL
        |--------------------------------------------------------------------------
        */

        $total =
            $produk->harga *
            $request->jumlah;

        /*
        |--------------------------------------------------------------------------
        | SIMPAN TRANSAKSI
        |--------------------------------------------------------------------------
        */

        Transaksi::create([

            'produk_id' =>
                $request->produk_id,

            'nama_pembeli' =>
                $request->nama_pembeli,

            'jumlah' =>
                $request->jumlah,

            'total' =>
                $total,

            'tanggal' =>
                $request->tanggal,

            'status' =>
                'Selesai'
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
        | ACTIVITY LOG REALTIME
        |--------------------------------------------------------------------------
        */

        ActivityLog::create([

            'user' =>
                auth()->user()->name,

            'aktivitas' =>
                'Melakukan transaksi produk '
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
            '/transaksi'
        )->with(
            'success',
            'Transaksi berhasil'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {

        $transaksi = Transaksi::find($id);

        /*
        |--------------------------------------------------------------------------
        | KEMBALIKAN STOK
        |--------------------------------------------------------------------------
        */

        $produk = Produk::find(
            $transaksi->produk_id
        );

        $produk->stok +=
            $transaksi->jumlah;

        $produk->save();

        /*
        |--------------------------------------------------------------------------
        | ACTIVITY LOG DELETE
        |--------------------------------------------------------------------------
        */

        ActivityLog::create([

            'user' =>
                auth()->user()->name,

            'aktivitas' =>
                'Menghapus transaksi produk '
                .$produk->nama_produk

        ]);

        /*
        |--------------------------------------------------------------------------
        | HAPUS TRANSAKSI
        |--------------------------------------------------------------------------
        */

        $transaksi->delete();

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect(
            '/transaksi'
        )->with(
            'success',
            'Transaksi berhasil dihapus'
        );
    }
}