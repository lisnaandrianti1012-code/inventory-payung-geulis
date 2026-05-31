@extends('layout')

@section('content')

<div class="table-card">

<!-- HEADER -->

<div class="d-flex
            justify-content-between
            align-items-center
            flex-wrap
            gap-3
            mb-4">

<div>

<h2 class="fw-bold mb-1">

<i class="fa fa-cart-shopping text-success"></i>

Transaksi Penjualan

</h2>

<p class="text-muted mb-0">

Data transaksi customer Payung Geulis

</p>

</div>

<div class="d-flex gap-2">

<a href="/laporan/pdf"
   class="btn btn-danger rounded-4 px-4">

<i class="fa fa-file-pdf"></i>

PDF

</a>

<a href="/transaksi/create"
   class="btn btn-success rounded-4 px-4">

<i class="fa fa-plus"></i>

Tambah

</a>

</div>

</div>

<!-- ALERT -->

@if(session('success'))

<div class="alert alert-success
            rounded-4
            border-0
            shadow-sm">

<i class="fa fa-circle-check"></i>

{{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="alert alert-danger
            rounded-4
            border-0
            shadow-sm">

<i class="fa fa-circle-exclamation"></i>

{{ session('error') }}

</div>

@endif

<!-- SEARCH -->

<form action="/transaksi"
      method="GET">

<div class="row mb-4">

<div class="col-md-4">

<input type="text"
       name="search"
       value="{{ $search ?? '' }}"
       class="form-control
              rounded-4"
       placeholder="Cari produk / pembeli...">

</div>

<div class="col-md-2">

<button class="btn btn-dark
               rounded-4
               w-100">

<i class="fa fa-search"></i>

Cari

</button>

</div>

</div>

</form>

<!-- TABLE -->

<div class="table-responsive">

<table class="table
              table-hover
              align-middle">

<thead class="table-light">

<tr>

<th>No</th>
<th>Produk</th>
<th>Pembeli</th>
<th>Jumlah</th>
<th>Total</th>
<th>Tanggal</th>
<th>Status</th>
<th class="text-center">

Aksi

</th>

</tr>

</thead>

<tbody>

@forelse($transaksi as $t)

<tr>

<!-- NO -->

<td class="fw-semibold">

{{ $loop->iteration }}

</td>

<!-- PRODUK -->

<td>

<div class="d-flex
            align-items-center
            gap-3">

<img src="{{ asset(
'gambar/'.$t->produk->gambar
) }}"
     width="55"
     height="55"
     style="
     object-fit:cover;
     border-radius:12px;
     ">

<div>

<div class="fw-semibold">

{{ $t->produk->nama_produk }}

</div>

<small class="text-muted">

{{ $t->produk->kategori }}

</small>

</div>

</div>

</td>

<!-- PEMBELI -->

<td>

<div class="fw-semibold">

{{ $t->nama_pembeli }}

</div>

</td>

<!-- JUMLAH -->

<td>

<span class="badge
             bg-primary
             px-3
             py-2
             rounded-pill">

{{ $t->jumlah }}

Unit

</span>

</td>

<!-- TOTAL -->

<td class="fw-bold text-success">

Rp
{{ number_format(
$t->total,
0,
',',
'.'
) }}

</td>

<!-- TANGGAL -->

<td>

{{ \Carbon\Carbon::parse(
$t->tanggal
)->format('d M Y') }}

</td>

<!-- STATUS -->

<td>

<span class="badge
             bg-success
             px-3
             py-2
             rounded-pill">

{{ $t->status }}

</span>

</td>

<!-- AKSI -->

<td class="text-center">

<div class="d-flex
            justify-content-center
            gap-2">

<a href="/transaksi/delete/{{ $t->id }}"
   class="btn btn-danger
          btn-sm
          rounded-3"
   onclick="return confirm(
   'Yakin ingin menghapus transaksi ini?'
   )">

<i class="fa fa-trash"></i>

</a>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="8"
    class="text-center
           text-muted
           py-5">

<img src=
"https://cdn-icons-png.flaticon.com/512/4076/4076549.png"
     width="110"
     class="mb-3">

<h5>

Belum Ada Transaksi

</h5>

<p>

Silahkan tambah transaksi baru

</p>

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

<!-- PAGINATION -->

<div class="mt-4">

{{ $transaksi->links() }}

</div>

<!-- FOOTER -->

<div class="d-flex
            justify-content-between
            align-items-center
            flex-wrap
            gap-2
            mt-4">

<div class="text-muted">

Total Data :
<b>

{{ $transaksi->total() }}

</b>

Transaksi

</div>

<div>

<span class="badge
             bg-success
             px-3
             py-2">

Realtime System

</span>

</div>

</div>

</div>

@endsection