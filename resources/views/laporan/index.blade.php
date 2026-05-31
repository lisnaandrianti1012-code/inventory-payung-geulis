@extends('layout')

@section('content')

<div class="d-flex
            justify-content-between
            align-items-center
            mb-4">

<div>

<h2 class="fw-bold">

Laporan Inventory

</h2>

<p class="text-muted">

Monitoring data inventory Payung Geulis

</p>

</div>

<div class="d-flex gap-2">

<a href="/laporan/pdf"
   class="btn btn-danger rounded-3">

<i class="fa fa-file-pdf"></i>

PDF

</a>

<a href="/laporan/excel"
   class="btn btn-success rounded-3">

<i class="fa fa-file-excel"></i>

Excel

</a>

</div>

</div>

<!-- FILTER -->

<div class="card border-0
            shadow-sm
            rounded-4
            mb-4">

<div class="card-body">

<form method="GET"
      action="/laporan">

<div class="row align-items-end">

<div class="col-md-4">

<label class="form-label fw-semibold">

Dari Tanggal

</label>

<input type="date"
       name="dari"
       value="{{ $dari }}"
       class="form-control">

</div>

<div class="col-md-4">

<label class="form-label fw-semibold">

Sampai Tanggal

</label>

<input type="date"
       name="sampai"
       value="{{ $sampai }}"
       class="form-control">

</div>

<div class="col-md-4">

<button class="btn btn-dark w-100">

<i class="fa fa-search"></i>

Filter Laporan

</button>

</div>

</div>

</form>

</div>

</div>

<!-- CARD STATISTIK -->

<div class="row mb-4">

<div class="col-md-3">

<div class="card border-0
            shadow-sm
            rounded-4
            text-white"
     style="background:#2563eb;">

<div class="card-body">

<h6>Total Produk</h6>

<h1 class="fw-bold">

{{ $totalProduk }}

</h1>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card border-0
            shadow-sm
            rounded-4
            text-white"
     style="background:#16a34a;">

<div class="card-body">

<h6>Total Stok</h6>

<h1 class="fw-bold">

{{ $totalStok }}

</h1>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card border-0
            shadow-sm
            rounded-4
            text-white"
     style="background:#ea580c;">

<div class="card-body">

<h6>Total Transaksi</h6>

<h1 class="fw-bold">

{{ $totalTransaksi }}

</h1>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card border-0
            shadow-sm
            rounded-4
            text-white"
     style="background:#7c3aed;">

<div class="card-body">

<h6>Total Pendapatan</h6>

<h3 class="fw-bold">

Rp {{ number_format($totalPendapatan) }}

</h3>

</div>

</div>

</div>

</div>

<!-- DATA PRODUK -->

<div class="card border-0
            shadow-sm
            rounded-4
            mb-4">

<div class="card-body">

<h4 class="fw-bold mb-4">

Data Produk

</h4>

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead class="table-dark">

<tr>

<th>No</th>
<th>Nama Produk</th>
<th>Kategori</th>
<th>Stok</th>
<th>Harga</th>

</tr>

</thead>

<tbody>

@foreach($produk as $p)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $p->nama_produk }}</td>

<td>{{ $p->kategori }}</td>

<td>

<span class="badge bg-success">

{{ $p->stok }}

</span>

</td>

<td>

Rp {{ number_format($p->harga) }}

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

<!-- STOK MASUK -->

<div class="card border-0
            shadow-sm
            rounded-4
            mb-4">

<div class="card-body">

<h4 class="fw-bold mb-4">

Data Stok Masuk

</h4>

<div class="table-responsive">

<table class="table table-hover">

<thead class="table-success">

<tr>

<th>No</th>
<th>Produk</th>
<th>Supplier</th>
<th>Jumlah</th>
<th>Tanggal</th>

</tr>

</thead>

<tbody>

@foreach($stokMasuk as $s)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $s->produk->nama_produk }}</td>

<td>{{ $s->supplier->nama_supplier }}</td>

<td>{{ $s->jumlah }}</td>

<td>{{ $s->tanggal }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

<!-- STOK KELUAR -->

<div class="card border-0
            shadow-sm
            rounded-4
            mb-4">

<div class="card-body">

<h4 class="fw-bold mb-4">

Data Stok Keluar

</h4>

<div class="table-responsive">

<table class="table table-hover">

<thead class="table-danger">

<tr>

<th>No</th>
<th>Produk</th>
<th>Jumlah</th>
<th>Tanggal</th>
<th>Tujuan</th>

</tr>

</thead>

<tbody>

@foreach($stokKeluar as $s)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $s->produk->nama_produk }}</td>

<td>{{ $s->jumlah }}</td>

<td>{{ $s->tanggal }}</td>

<td>{{ $s->tujuan }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

<!-- TRANSAKSI -->

<div class="card border-0
            shadow-sm
            rounded-4">

<div class="card-body">

<h4 class="fw-bold mb-4">

Data Transaksi

</h4>

<div class="table-responsive">

<table class="table table-hover">

<thead class="table-primary">

<tr>

<th>No</th>
<th>Pembeli</th>
<th>Produk</th>
<th>Jumlah</th>
<th>Total</th>
<th>Tanggal</th>

</tr>

</thead>

<tbody>

@foreach($transaksi as $t)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $t->nama_pembeli }}</td>

<td>{{ $t->produk->nama_produk }}</td>

<td>{{ $t->jumlah }}</td>

<td>

Rp {{ number_format($t->total) }}

</td>

<td>{{ $t->tanggal }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

@endsection