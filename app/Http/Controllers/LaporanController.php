<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\StokMasuk;
use App\Models\StokKeluar;
use App\Models\Transaksi;

use App\Exports\LaporanExport;

use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | HALAMAN LAPORAN
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {

        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        $dari =
            $request->dari;

        $sampai =
            $request->sampai;

        /*
        |--------------------------------------------------------------------------
        | QUERY TRANSAKSI
        |--------------------------------------------------------------------------
        */

        $query = Transaksi::with(
                    'produk'
                )
                ->latest();

        /*
        |--------------------------------------------------------------------------
        | FILTER
        |--------------------------------------------------------------------------
        */

        if($dari && $sampai){

            $query->whereBetween(
                'tanggal',
                [$dari, $sampai]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA
        |--------------------------------------------------------------------------
        */

        $transaksi = $query->get();

        /*
        |--------------------------------------------------------------------------
        | DATA LAIN
        |--------------------------------------------------------------------------
        */

        $produk = Produk::latest()->get();

        $stokMasuk = StokMasuk::with(
                'produk',
                'supplier'
            )
            ->latest()
            ->get();

        $stokKeluar = StokKeluar::with(
                'produk'
            )
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | TOTAL
        |--------------------------------------------------------------------------
        */

        $totalProduk =
            Produk::count();

        $totalStok =
            Produk::sum('stok');

        $totalTransaksi =
            $transaksi->count();

        $totalPendapatan =
            $transaksi->sum('total');

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'laporan.index',
            compact(

                'produk',

                'stokMasuk',

                'stokKeluar',

                'transaksi',

                'totalProduk',

                'totalStok',

                'totalTransaksi',

                'totalPendapatan',

                'dari',

                'sampai'

            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EXPORT PDF
    |--------------------------------------------------------------------------
    */

    public function pdf()
    {

        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */

        $produk = Produk::all();

        $stokMasuk = StokMasuk::with(
                'produk',
                'supplier'
            )
            ->get();

        $stokKeluar = StokKeluar::with(
                'produk'
            )
            ->get();

        $transaksi = Transaksi::with(
                'produk'
            )
            ->get();

        /*
        |--------------------------------------------------------------------------
        | TOTAL
        |--------------------------------------------------------------------------
        */

        $totalProduk =
            Produk::count();

        $totalStok =
            Produk::sum('stok');

        $totalTransaksi =
            Transaksi::count();

        $totalPendapatan =
            Transaksi::sum('total');

        /*
        |--------------------------------------------------------------------------
        | GENERATE PDF
        |--------------------------------------------------------------------------
        */

        $pdf = Pdf::loadView(

            'laporan.pdf',

            compact(

                'produk',

                'stokMasuk',

                'stokKeluar',

                'transaksi',

                'totalProduk',

                'totalStok',

                'totalTransaksi',

                'totalPendapatan'

            )

        );

        /*
        |--------------------------------------------------------------------------
        | PAPER
        |--------------------------------------------------------------------------
        */

        $pdf->setPaper(
            'A4',
            'portrait'
        );

        /*
        |--------------------------------------------------------------------------
        | DOWNLOAD
        |--------------------------------------------------------------------------
        */

        return $pdf->download(

            'laporan-payung-geulis.pdf'

        );
    }

    /*
    |--------------------------------------------------------------------------
    | EXPORT EXCEL
    |--------------------------------------------------------------------------
    */

    public function excel()
    {

        return Excel::download(

            new LaporanExport,

            'laporan-payung-geulis.xlsx'

        );
    }
}