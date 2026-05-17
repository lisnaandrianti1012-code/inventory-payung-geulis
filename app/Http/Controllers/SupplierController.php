<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{

    // INDEX

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

    // CREATE

    public function create()
    {

        return view(
            'supplier.create'
        );
    }

    // STORE

    public function store(Request $request)
    {

        Supplier::create([

            'nama_supplier' =>
                $request->nama_supplier,

            'alamat' =>
                $request->alamat,

            'no_hp' =>
                $request->no_hp,
        ]);

        return redirect(
            '/supplier'
        );
    }

    // DELETE

    public function destroy($id)
    {

        Supplier::find($id)->delete();

        return redirect(
            '/supplier'
        );
    }
}