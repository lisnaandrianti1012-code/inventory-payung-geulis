<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{

    protected $fillable = [

        'produk_id',
        'nama_pembeli',
        'jumlah',
        'total',
        'tanggal'
    ];

    public function produk()
    {

        return $this->belongsTo(
            Produk::class
        );
    }
}