<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukCustomer extends Model
{
    protected $fillable = [

        'nama_produk',

        'harga',

        'stok',

        'deskripsi',

        'gambar',
    ];
}