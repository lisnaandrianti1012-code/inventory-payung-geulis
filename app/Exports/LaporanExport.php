<?php

namespace App\Exports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanExport implements FromCollection
{

    public function collection()
    {

        return Produk::select(

            'nama_produk',
            'kategori',
            'stok',
            'harga'

        )->get();
    }
}