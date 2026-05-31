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

<i class="fa fa-cart-plus text-success"></i>

Tambah Transaksi

</h2>

<p class="text-muted mb-0">

Input transaksi penjualan customer

</p>

</div>

<a href="/transaksi"
   class="btn btn-outline-dark rounded-4 px-4">

<i class="fa fa-arrow-left"></i>

Kembali

</a>

</div>

<!-- ERROR -->

@if($errors->any())

<div class="alert alert-danger rounded-4">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<!-- FORM -->

<form action="/transaksi/store"
      method="POST">

@csrf

<div class="row">

<!-- PRODUK -->

<div class="col-md-6 mb-4">

<label class="form-label fw-semibold">

Produk

</label>

<select name="produk_id"
        class="form-select rounded-4 p-3"
        required>

<option value="">

-- Pilih Produk --

</option>

@foreach($produk as $p)

<option value="{{ $p->id }}">

{{ $p->nama_produk }}
-
Stok:
{{ $p->stok }}

</option>

@endforeach

</select>

</div>

<!-- PEMBELI -->

<div class="col-md-6 mb-4">

<label class="form-label fw-semibold">

Nama Pembeli

</label>

<input type="text"
       name="nama_pembeli"
       class="form-control
              rounded-4
              p-3"
       placeholder="Masukkan nama pembeli"
       required>

</div>

<!-- JUMLAH -->

<div class="col-md-6 mb-4">

<label class="form-label fw-semibold">

Jumlah Pembelian

</label>

<input type="number"
       name="jumlah"
       class="form-control
              rounded-4
              p-3"
       placeholder="Masukkan jumlah"
       required>

</div>

<!-- TANGGAL -->

<div class="col-md-6 mb-4">

<label class="form-label fw-semibold">

Tanggal Transaksi

</label>

<input type="date"
       name="tanggal"
       class="form-control
              rounded-4
              p-3"
       required>

</div>

</div>

<!-- BUTTON -->

<div class="mt-3">

<button class="btn btn-success
               rounded-4
               px-5
               py-3
               shadow-sm">

<i class="fa fa-save"></i>

Simpan Transaksi

</button>

</div>

</form>

</div>

@endsection