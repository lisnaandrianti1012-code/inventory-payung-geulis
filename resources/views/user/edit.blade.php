@extends('layout')

@section('content')

<div class="table-card">

<div class="d-flex
            justify-content-between
            align-items-center
            mb-4">

<div>

<h3 class="fw-bold">

Edit User

</h3>

<p class="text-muted">

Update data user

</p>

</div>

<a href="/user"
   class="btn btn-secondary">

<i class="fa fa-arrow-left"></i>

Kembali

</a>

</div>

<form action="/user/update/{{ $user->id }}"
      method="POST">

@csrf

<div class="row">

<div class="col-md-6">

<div class="mb-3">

<label>Nama</label>

<input type="text"
       name="name"
       value="{{ $user->name }}"
       class="form-control">

</div>

</div>

<div class="col-md-6">

<div class="mb-3">

<label>Email</label>

<input type="email"
       name="email"
       value="{{ $user->email }}"
       class="form-control">

</div>

</div>

</div>

<div class="mb-3">

<label>Role</label>

<select name="role"
        class="form-select">

<option
value="admin"
{{ $user->role == 'admin' ? 'selected' : '' }}>

Admin

</option>

<option
value="gudang"
{{ $user->role == 'gudang' ? 'selected' : '' }}>

Gudang

</option>

<option
value="kasir"
{{ $user->role == 'kasir' ? 'selected' : '' }}>

Kasir

</option>

<option
value="owner"
{{ $user->role == 'owner' ? 'selected' : '' }}>

Owner

</option>

</select>

</div>

<button class="btn btn-warning px-4">

<i class="fa fa-save"></i>

Update User

</button>

</form>

</div>

@endsection