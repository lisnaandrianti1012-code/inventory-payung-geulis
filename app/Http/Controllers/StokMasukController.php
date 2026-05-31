<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StokMasuk;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\ActivityLog;

class StokMasukController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

   public function index(Request $request)
{

    /*
    |--------------------------------------------------------------------------
    | SEARCH
    |--------------------------------------------------------------------------
    */

    $search = $request->search;

    /*
    |--------------------------------------------------------------------------
    | QUERY
    |--------------------------------------------------------------------------
    */

    $stokMasuk = StokMasuk::with(
                    'produk',
                    'supplier'
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

                ->orWhereHas(
                    'supplier',
                    function($query) use ($search){

                        $query->where(
                            'nama_supplier',
                            'like',
                            '%'.$search.'%'
                        );
                    }
                )

                ->orWhere(
                    'tanggal',
                    'like',
                    '%'.$search.'%'
                )

                ->latest()

                ->get();

    /*
    |--------------------------------------------------------------------------
    | RETURN VIEW
    |--------------------------------------------------------------------------
    */

    return view(
        'stok_masuk.index',
        compact(
            'stokMasuk',
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

        $supplier = Supplier::all();

        return view(
            'stok_masuk.create',
            compact(
                'produk',
                'supplier'
            )
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

            'supplier_id' =>
                'required',

            'jumlah' =>
                'required|numeric|min:1',

            'tanggal' =>
                'required'

        ]);

        /*
        |--------------------------------------------------------------------------
        | SIMPAN STOK MASUK
        |--------------------------------------------------------------------------
        */

        StokMasuk::create([

            'produk_id' =>
                $request->produk_id,

            'supplier_id' =>
                $request->supplier_id,

            'jumlah' =>
                $request->jumlah,

            'tanggal' =>
                $request->tanggal,

            'keterangan' =>
                $request->keterangan

        ]);

        /*
        |--------------------------------------------------------------------------
        | UPDATE STOK
        |--------------------------------------------------------------------------
        */

        $produk = Produk::find(
            $request->produk_id
        );

        $produk->stok +=
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
                'Menambahkan stok masuk produk '
                .$produk->nama_produk

        ]);

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect(
            '/stok-masuk'
        )->with(
            'success',
            'Stok berhasil ditambahkan'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {

        $stokMasuk = StokMasuk::find($id);

        $produk = Produk::find(
            $stokMasuk->produk_id
        );

        $produk->stok -=
            $stokMasuk->jumlah;

        $produk->save();

        ActivityLog::create([

            'user' =>
                auth()->user()->name,

            'aktivitas' =>
                'Menghapus stok masuk produk '
                .$produk->nama_produk

        ]);

        $stokMasuk->delete();

        return redirect(
            '/stok-masuk'
        )->with(
            'success',
            'Data berhasil dihapus'
        );
    }

}