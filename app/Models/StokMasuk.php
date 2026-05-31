<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokMasuk extends Model
{

    protected $table = 'stok_masuks';

    protected $fillable = [

        'produk_id',
        'supplier_id',
        'jumlah',
        'tanggal',
        'keterangan'

    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI PRODUK
    |--------------------------------------------------------------------------
    */

    public function produk()
    {

        return $this->belongsTo(
            Produk::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI SUPPLIER
    |--------------------------------------------------------------------------
    */

    public function supplier()
    {

        return $this->belongsTo(
            Supplier::class
        );
    }
}