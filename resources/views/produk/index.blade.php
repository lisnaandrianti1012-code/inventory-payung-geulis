@extends('layout')

@section('content')

<div class="d-flex
            justify-content-between
            align-items-center
            mb-4">

<div>

<h2>Data Produk</h2>

<form action="/produk"
      method="GET"
      class="d-flex mt-3">

<input type="text"
       name="search"
       class="form-control me-2"
       placeholder="Cari produk..."
       value="{{ $search ?? '' }}">

<button class="btn btn-dark">

Cari

</button>

</form>

</div>

<a href="/produk/create"
   class="btn btn-warning">

<i class="fa fa-plus"></i>

Tambah Produk

</a>

</div>

<table class="table align-middle">

<tr>

<th>No</th>
<th>Foto</th>
<th>Nama Produk</th>
<th>Kategori</th>
<th>Stok</th>
<th>Harga</th>
<th>Aksi</th>

</tr>

@foreach($produk as $p)

<tr>

<td>{{ $loop->iteration }}</td>

<td>

<img src="{{ str_starts_with($p->gambar, 'http') ? $p->gambar : '/gambar/'.$p->gambar }}"
     width="80"
     class="rounded">

</td>

<td>{{ $p->nama_produk }}</td>

<td>{{ $p->kategori }}</td>

<td>{{ $p->stok }}</td>

<td>

Rp {{ number_format($p->harga) }}

</td>
<td>

<a href="/produk/edit/{{ $p->id }}"
   class="btn btn-warning btn-sm">

<i class="fa fa-edit"></i>

</a>

<a href="/produk/delete/{{ $p->id }}"
   class="btn btn-danger btn-sm"
   onclick="return confirm(
   'Yakin hapus produk?'
   )">

<i class="fa fa-trash"></i>

</a>

</td>

</tr>


@endforeach

</table>
<div class="mt-4">

{{ $produk->links() }}

</div>

</div>

@endsection