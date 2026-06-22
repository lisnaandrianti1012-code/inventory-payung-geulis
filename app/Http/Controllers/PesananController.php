<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
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
        | DATA PESANAN
        |--------------------------------------------------------------------------
        */

        $pesanan = Pesanan::when(
                        $search,
                        function($query) use ($search){

                            $query->where(
                                'nama_customer',
                                'like',
                                '%'.$search.'%'
                            )

                            ->orWhere(
                                'nama_produk',
                                'like',
                                '%'.$search.'%'
                            );

                        }
                    )

                    ->latest()

                    ->get();

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'pesanan.index',
            compact(
                'pesanan',
                'search'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $pesanan->delete();

        return redirect(
            '/pesanan'
        )->with(

            'success',

            'Pesanan berhasil dihapus'
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
            'status' => 'required|in:Pending,Diproses,Dikirim,Selesai'
        ]);

        $pesanan = Pesanan::findOrFail($id);

        $pesanan->status = $request->status;

        $pesanan->save();

        return redirect(
            '/pesanan'
        )->with(

            'success',

            'Status pesanan berhasil diperbarui'
        );
    }
}