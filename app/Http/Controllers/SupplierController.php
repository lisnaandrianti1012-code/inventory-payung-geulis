<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $search = $request->search;

        $supplier = Supplier::where(
                            'nama_supplier',
                            'like',
                            '%'.$search.'%'
                        )

                        ->orWhere(
                            'alamat',
                            'like',
                            '%'.$search.'%'
                        )

                        ->orWhere(
                            'jenis_supplier',
                            'like',
                            '%'.$search.'%'
                        )

                        ->latest()

                        ->get();

        return view(
            'supplier.index',
            compact(
                'supplier',
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
            'supplier.create'
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

            'nama_supplier' =>
            'required',

            'jenis_supplier' =>
            'required',

            'alamat' =>
            'required',

            'no_hp' =>
            'required',

        ]);

        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATA
        |--------------------------------------------------------------------------
        */

        Supplier::create([

            'nama_supplier' =>

                $request->nama_supplier,

            'jenis_supplier' =>

                $request->jenis_supplier,

            'alamat' =>

                $request->alamat,

            'no_hp' =>

                $request->no_hp,
        ]);

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect(
            '/supplier'
        )->with(

            'success',

            'Supplier berhasil ditambahkan'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);

        return view(
            'supplier.edit',
            compact('supplier')
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

        $supplier = Supplier::findOrFail($id);

        $supplier->update([

            'nama_supplier' =>

                $request->nama_supplier,

            'jenis_supplier' =>

                $request->jenis_supplier,

            'alamat' =>

                $request->alamat,

            'no_hp' =>

                $request->no_hp,
        ]);

        return redirect(
            '/supplier'
        )->with(

            'success',

            'Supplier berhasil diupdate'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        Supplier::find($id)->delete();

        return redirect(
            '/supplier'
        )->with(

            'success',

            'Supplier berhasil dihapus'
        );
    }
}