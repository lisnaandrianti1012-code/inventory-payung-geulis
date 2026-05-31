@extends('layout')

@section('content')

<div class="table-card">

<!-- HEADER -->

<div class="d-flex
            justify-content-between
            align-items-center
            mb-4">

<div>

<h2 class="fw-bold">

Stok Keluar

</h2>

<p class="text-muted">

Data barang keluar dari gudang

</p>

</div>

<div class="d-flex gap-2">

<a href="/stok-keluar/create"
   class="btn btn-danger px-4">

<i class="fa fa-plus"></i>

Tambah Stok Keluar

</a>

</div>

</div>

<!-- ALERT -->

@if(session('error'))

<div class="alert alert-danger
            rounded-4">

<i class="fa fa-circle-exclamation"></i>

{{ session('error') }}

</div>

@endif

@if(session('success'))

<div class="alert alert-success
            rounded-4">

<i class="fa fa-circle-check"></i>

{{ session('success') }}

</div>

@endif

<!-- SEARCH -->

<div class="row mb-4">

<div class="col-md-4">

<input type="text"
       class="form-control rounded-4"
       placeholder="Cari produk...">

</div>

</div>

<!-- TABLE -->

<div class="table-responsive">

<table class="table
              table-hover
              align-middle">

<thead class="table-light">

<tr>

<th>No</th>
<th>Produk</th>
<th>Jumlah</th>
<th>Tanggal</th>
<th>Tujuan</th>
<th>Status</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

@forelse($stokKeluar as $s)

<tr>

<td>

{{ $loop->iteration }}

</td>

<td>

<div class="fw-semibold">

{{ $s->produk->nama_produk }}

</div>

<small class="text-muted">

ID Produk :
{{ $s->produk->id }}

</small>

</td>

<td>

<span class="badge
             bg-danger
             px-3
             py-2">

{{ $s->jumlah }}

Unit

</span>

</td>

<td>

<i class="fa fa-calendar text-secondary"></i>

{{ \Carbon\Carbon::parse(
$s->tanggal
)->format('d M Y') }}

</td>

<td>

<i class="fa fa-location-dot
          text-danger">

</i>

{{ $s->tujuan }}

</td>

<td>

<span class="badge
             bg-warning
             text-dark
             px-3
             py-2">

Barang Keluar

</span>

</td>

<td>

<div class="d-flex gap-2">

<a href="/stok-keluar/delete/{{ $s->id }}"
   class="btn btn-danger btn-sm"
   onclick="return confirm(
   'Yakin ingin menghapus data ini?'
   )">

<i class="fa fa-trash"></i>

</a>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="7"
    class="text-center
           py-5">

<i class="fa fa-box-open
          fa-3x
          text-muted
          mb-3">

</i>

<p class="text-muted">

Belum ada data stok keluar

</p>

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@endsection