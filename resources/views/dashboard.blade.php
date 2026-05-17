@extends('layout')

@section('content')

<!-- HEADER -->

<div class="d-flex
            justify-content-between
            align-items-center
            flex-wrap
            mb-4">

<div>

<h2 class="fw-bold mb-1">

Dashboard Inventory

</h2>

<p class="text-muted mb-0">

Selamat datang kembali,
<b>{{ auth()->user()->name }}</b>

👋

</p>

</div>

<div>

<div class="bg-dark
            text-white
            px-4
            py-3
            rounded-4
            shadow-sm">

<i class="fa fa-calendar"></i>

{{ now()->format('d F Y') }}

</div>

</div>

</div>

<!-- CARD DASHBOARD -->

<div class="row g-4">

<!-- TOTAL PRODUK -->

<div class="col-lg-3 col-md-6">

<div class="dashboard-card bg-primary">

<div>

<p>Total Produk</p>

<h2>

{{ $totalProduk }}

</h2>

</div>

<i class="fa fa-box"></i>

</div>

</div>

<!-- TOTAL STOK -->

<div class="col-lg-3 col-md-6">

<div class="dashboard-card bg-success">

<div>

<p>Total Stok</p>

<h2>

{{ $totalStok }}

</h2>

</div>

<i class="fa fa-warehouse"></i>

</div>

</div>

<!-- STOK MASUK -->

<div class="col-lg-3 col-md-6">

<div class="dashboard-card bg-warning">

<div>

<p>Stok Masuk</p>

<h2>

{{ $stokMasuk }}

</h2>

</div>

<i class="fa fa-arrow-down"></i>

</div>

</div>

<!-- STOK KELUAR -->

<div class="col-lg-3 col-md-6">

<div class="dashboard-card bg-danger">

<div>

<p>Stok Keluar</p>

<h2>

{{ $stokKeluar }}

</h2>

</div>

<i class="fa fa-arrow-up"></i>

</div>

</div>

</div>

<!-- ROW 2 -->

<div class="row g-4 mt-1">

<!-- TRANSAKSI -->

<div class="col-lg-4">

<div class="mini-card">

<div>

<p>Total Transaksi</p>

<h3>

{{ $totalTransaksi }}

</h3>

</div>

<div class="icon-circle bg-primary-subtle">

<i class="fa fa-cart-shopping text-primary"></i>

</div>

</div>

</div>

<!-- PENDAPATAN -->

<div class="col-lg-4">

<div class="mini-card">

<div>

<p>Pendapatan</p>

<h3 class="text-success">

Rp
{{ number_format($totalPendapatan) }}

</h3>

</div>

<div class="icon-circle bg-success-subtle">

<i class="fa fa-money-bill-wave text-success"></i>

</div>

</div>

</div>

<!-- SUPPLIER -->

<div class="col-lg-4">

<div class="mini-card">

<div>

<p>Total Supplier</p>

<h3 class="text-warning">

{{ $totalSupplier }}

</h3>

</div>

<div class="icon-circle bg-warning-subtle">

<i class="fa fa-truck text-warning"></i>

</div>

</div>

</div>

</div>

<!-- GRAFIK -->

<div class="table-card mt-4">

<div class="d-flex
            justify-content-between
            align-items-center
            mb-4">

<h4 class="fw-bold mb-0">

Grafik Penjualan Realtime

</h4>

<span class="badge
             bg-success
             px-3
             py-2
             rounded-4">

Realtime

</span>

</div>

<canvas id="stokChart"
        height="100">

</canvas>

</div>

<!-- STOK MENIPIS -->

@if(count($stokMinimum) > 0)

<div class="table-card mt-4">

<div class="d-flex
            justify-content-between
            align-items-center
            mb-4">

<h4 class="fw-bold text-danger mb-0">

⚠ Notifikasi Stok Menipis

</h4>

</div>

<div class="row">

@foreach($stokMinimum as $s)

<div class="col-md-4 mb-3">

<div class="alert
            alert-danger
            rounded-4
            border-0
            shadow-sm">

<div class="d-flex
            justify-content-between
            align-items-center">

<div>

<h6 class="fw-bold mb-1">

{{ $s->nama_produk }}

</h6>

<small>

Kategori:
{{ $s->kategori }}

</small>

</div>

<span class="badge
             bg-danger
             px-3
             py-2">

{{ $s->stok }}

</span>

</div>

</div>

</div>

@endforeach

</div>

</div>

@endif

<!-- PRODUK TERLARIS -->

<div class="table-card mt-4">

<h4 class="fw-bold mb-4">

🔥 Produk Terlaris

</h4>

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead class="table-light">

<tr>

<th>No</th>
<th>Produk</th>
<th>Total Terjual</th>

</tr>

</thead>

<tbody>

@foreach($produkTerlaris as $p)

<tr>

<td>

{{ $loop->iteration }}

</td>

<td>

<div class="d-flex
            align-items-center
            gap-3">

<img src="{{ asset('gambar/'.$p->produk->gambar) }}"
     width="60"
     height="60"
     style="
     border-radius:14px;
     object-fit:cover;
     ">

<div>

<div class="fw-semibold">

{{ $p->produk->nama_produk }}

</div>

<small class="text-muted">

{{ $p->produk->kategori }}

</small>

</div>

</div>

</td>

<td>

<span class="badge
             bg-primary
             px-3
             py-2">

{{ $p->total_terjual }}

</span>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

<!-- AKTIVITAS -->

<div class="table-card mt-4">

<h4 class="fw-bold mb-4">

Aktivitas Realtime

</h4>

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead class="table-light">

<tr>

<th>User</th>
<th>Aktivitas</th>
<th>Waktu</th>

</tr>

</thead>

<tbody>

@foreach($aktivitas as $a)

<tr>

<td>

<span class="fw-semibold">

{{ $a->user }}

</span>

</td>

<td>

{{ $a->aktivitas }}

</td>

<td>

<span class="text-muted">

{{ $a->created_at->diffForHumans() }}

</span>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

<!-- STYLE -->

<style>

.dashboard-card{

    border-radius:28px;
    padding:30px;
    color:white;
    display:flex;
    justify-content:space-between;
    align-items:center;
    min-height:150px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.dashboard-card h2{

    font-size:42px;
    font-weight:700;
}

.dashboard-card p{

    margin-bottom:8px;
    opacity:0.9;
}

.dashboard-card i{

    font-size:55px;
    opacity:0.25;
}

.mini-card{

    background:white;
    border-radius:24px;
    padding:28px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 5px 20px rgba(0,0,0,0.05);
    height:100%;
}

.icon-circle{

    width:60px;
    height:60px;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:24px;
}

</style>

<!-- CHART -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx =
document.getElementById('stokChart');

new Chart(ctx, {

    type:'line',

    data:{

        labels:
        {!! json_encode($labelBulan) !!},

        datasets:[{

            label:'Pendapatan',

            data:
            {!! json_encode($dataGrafik) !!},

            borderColor:'#14b8a6',

            backgroundColor:
            'rgba(20,184,166,0.1)',

            fill:true,

            tension:0.4,

            borderWidth:4,

            pointBackgroundColor:'#14b8a6',

            pointRadius:5

        }]
    },

    options:{

        responsive:true,

        plugins:{

            legend:{

                display:true

            }

        }
    }

});

</script>

@endsection