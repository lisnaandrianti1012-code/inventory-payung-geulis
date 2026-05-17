@extends('layout')

@section('content')

<div class="table-card">

<h3 class="mb-4">

Tambah Supplier

</h3>

<form action="/supplier/store"
      method="POST">

@csrf

<div class="mb-3">

<label>

Nama Supplier

</label>

<input type="text"
       name="nama_supplier"
       class="form-control">

</div>

<div class="mb-3">

<label>

Alamat

</label>

<textarea name="alamat"
          class="form-control">

</textarea>

</div>

<div class="mb-3">

<label>

No HP

</label>

<input type="text"
       name="no_hp"
       class="form-control">

</div>

<button class="btn btn-warning">

Simpan

</button>

</form>

</div>

@endsection