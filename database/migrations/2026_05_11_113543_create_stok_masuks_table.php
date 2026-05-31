<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::create(
            'stok_masuks',
            function (Blueprint $table) {

                $table->id();

                $table->foreignId(
                    'produk_id'
                );

                $table->integer(
                    'jumlah'
                );

                $table->date(
                    'tanggal'
                );

                $table->string(
                    'keterangan'
                );

                $table->timestamps();
            }
        );
    }

    public function down(): void
    {

        Schema::dropIfExists(
            'stok_masuks'
        );
    }
};