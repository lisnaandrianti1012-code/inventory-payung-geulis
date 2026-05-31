@extends('layout')

@section('content')

<div class="table-card">

<h2 class="mb-4">

Edit Produk

</h2>

<form action="/produk/update/{{ $produk->id }}"
      method="POST"
      enctype="multipart/form-data">

@csrf

<div class="mb-3">

<label>Nama Produk</label>

<input type="text"
       name="nama_produk"
       class="form-control"
       value="{{ $produk->nama_produk }}">

</div>

<div class="mb-3">

<label>Kategori</label>

<input type="text"
       name="kategori"
       class="form-control"
       value="{{ $produk->kategori }}">

</div>

<div class="mb-3">

<label>Stok</label>

<input type="number"
       name="stok"
       class="form-control"
       value="{{ $produk->stok }}">

</div>

<div class="mb-3">

<label>Harga</label>

<input type="number"
       name="harga"
       class="form-control"
       value="{{ $produk->harga }}">

</div>

<div class="mb-3">

<label>Gambar Baru</label>

<input type="file"
       name="gambar"
       class="form-control">

</div>

<button class="btn btn-warning">

Update Produk

</button>
@if($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif
</form>

</div>

@endsection