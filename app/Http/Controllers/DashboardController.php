<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\StokMasuk;
use App\Models\StokKeluar;
use App\Models\Transaksi;
use App\Models\Supplier;
use App\Models\ActivityLog;

class DashboardController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        /*
        |--------------------------------------------------------------------------
        | CARD DASHBOARD
        |--------------------------------------------------------------------------
        */

        $totalProduk =
            Produk::count();

        $totalStok =
            Produk::sum('stok');

        $stokMasuk =
            StokMasuk::sum('jumlah');

        $stokKeluar =
            StokKeluar::sum('jumlah');

        $totalTransaksi =
            Transaksi::count();

        $totalPendapatan =
            Transaksi::sum('total');

        $totalSupplier =
            Supplier::count();

        /*
        |--------------------------------------------------------------------------
        | NOTIFIKASI STOK MENIPIS
        |--------------------------------------------------------------------------
        */

        $stokMinimum = Produk::where(
                'stok',
                '<=',
                5
            )
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | PRODUK TERLARIS
        |--------------------------------------------------------------------------
        */

        $produkTerlaris = Transaksi::selectRaw(
                '
                produk_id,
                SUM(jumlah) as total_terjual
                '
            )
            ->groupBy('produk_id')
            ->with('produk')
            ->orderByDesc('total_terjual')
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | AKTIVITAS REALTIME
        |--------------------------------------------------------------------------
        */

        $aktivitas = ActivityLog::latest()
                        ->take(8)
                        ->get();

        /*
        |--------------------------------------------------------------------------
        | GRAFIK PENJUALAN
        |--------------------------------------------------------------------------
        */

        $dataGrafik = [];

        for($i = 1; $i <= 12; $i++){

            $total = Transaksi::whereMonth(
                        'tanggal',
                        $i
                    )
                    ->sum('total');

            $dataGrafik[] = $total;
        }

        /*
        |--------------------------------------------------------------------------
        | LABEL BULAN
        |--------------------------------------------------------------------------
        */

        $labelBulan = [

            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Ags',
            'Sep',
            'Okt',
            'Nov',
            'Des'

        ];

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'dashboard',
            compact(

                'totalProduk',

                'totalStok',

                'stokMasuk',

                'stokKeluar',

                'totalTransaksi',

                'totalPendapatan',

                'totalSupplier',

                'stokMinimum',

                'produkTerlaris',

                'aktivitas',

                'dataGrafik',

                'labelBulan'

            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | REALTIME AJAX
    |--------------------------------------------------------------------------
    */

    public function realtime()
    {

        return response()->json([

            'totalProduk' =>
                Produk::count(),

            'totalStok' =>
                Produk::sum('stok'),

            'totalTransaksi' =>
                Transaksi::count(),

            'totalPendapatan' =>
                number_format(
                    Transaksi::sum('total')
                ),

            'stokMinimum' =>
                Produk::where(
                    'stok',
                    '<=',
                    5
                )->count()

        ]);
    }
}