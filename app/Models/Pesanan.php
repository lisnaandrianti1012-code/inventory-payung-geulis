<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [

        'nama_customer',

        'produk',

        'jumlah',

        'total_harga',

        'alamat',

        'status',

        'email'

    ];
}