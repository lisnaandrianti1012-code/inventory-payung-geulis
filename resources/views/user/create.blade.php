@extends('layout')

@section('content')

<div class="table-card">

<h3 class="fw-bold mb-4">

Tambah User

</h3>

<form action="/user/store"
      method="POST">

@csrf

<div class="mb-3">

<label>Nama</label>

<input type="text"
       name="name"
       class="form-control rounded-4">

</div>

<div class="mb-3">

<label>Email</label>

<input type="email"
       name="email"
       class="form-control rounded-4">

</div>

<div class="mb-3">

<label>Password</label>

<input type="password"
       name="password"
       class="form-control rounded-4">

</div>

<div class="mb-3">

<label>Role</label>

<select name="role"
        class="form-control rounded-4">

<option value="admin">Admin</option>
<option value="gudang">Gudang</option>
<option value="kasir">Kasir</option>
<option value="owner">Owner</option>

</select>

</div>

<button class="btn btn-dark px-4 rounded-4">

Simpan

</button>

</form>

</div>

@endsection