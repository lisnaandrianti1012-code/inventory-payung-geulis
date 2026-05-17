@extends('layout')

@section('content')

<div class="table-card">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>

<h2 class="fw-bold">

Manajemen User

</h2>

<p class="text-muted">

Kelola semua akun user

</p>

</div>

<a href="/user/create"
   class="btn btn-dark px-4 rounded-4">

<i class="fa fa-plus"></i>

Tambah User

</a>

</div>

@if(session('success'))

<div class="alert alert-success rounded-4">

{{ session('success') }}

</div>

@endif

<div class="table-responsive">

<table class="table align-middle table-hover">

<thead class="table-light">

<tr>

<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>Role</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

@foreach($user as $u)

<tr>

<td>

{{ $loop->iteration }}

</td>

<td>

{{ $u->name }}

</td>

<td>

{{ $u->email }}

</td>

<td>

<span class="badge bg-dark px-3 py-2">

{{ $u->role }}

</span>

</td>

<td>

<a href="/user/edit/{{ $u->id }}"
   class="btn btn-warning btn-sm rounded-3">

<i class="fa fa-edit"></i>

</a>

<a href="/user/delete/{{ $u->id }}"
   class="btn btn-danger btn-sm rounded-3">

<i class="fa fa-trash"></i>

</a>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

@endsection
