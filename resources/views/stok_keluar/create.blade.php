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

Tambah Stok Keluar

</h2>

<p class="text-muted">

Input data barang keluar dari gudang

</p>

</div>

<a href="/stok-keluar"
   class="btn btn-secondary">

<i class="fa fa-arrow-left"></i>

Kembali

</a>

</div>

<!-- VALIDATION -->

@if ($errors->any())

<div class="alert alert-danger
            rounded-4">

<ul class="mb-0">

@foreach ($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<!-- FORM -->

<form action="/stok-keluar/store"
      method="POST">

@csrf

<div class="row">

    <!-- PRODUK -->

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label fw-semibold">

                Produk

            </label>

            <div class="input-group">

                <span class="input-group-text">

                    <i class="fa fa-box"></i>

                </span>

                <select name="produk_id"
                        class="form-control">

                    <option value="">

                        -- Pilih Produk --

                    </option>

                    @foreach($produk as $p)

                    <option value="{{ $p->id }}">

                        {{ $p->nama_produk }}

                    </option>

                    @endforeach

                </select>

            </div>

        </div>

    </div>

    <!-- JUMLAH -->

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label fw-semibold">

                Jumlah Keluar

            </label>

            <div class="input-group">

                <span class="input-group-text">

                    <i class="fa fa-arrow-up"></i>

                </span>

                <input type="number"
                       name="jumlah"
                       class="form-control"
                       placeholder="Masukkan jumlah">

            </div>

        </div>

    </div>

</div>

<div class="row">

    <!-- TANGGAL -->

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label fw-semibold">

                Tanggal Keluar

            </label>

            <div class="input-group">

                <span class="input-group-text">

                    <i class="fa fa-calendar"></i>

                </span>

                <input type="date"
                       name="tanggal"
                       class="form-control">

            </div>

        </div>

    </div>

    <!-- TUJUAN -->

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label fw-semibold">

                Tujuan Barang

            </label>

            <div class="input-group">

                <span class="input-group-text">

                    <i class="fa fa-location-dot"></i>

                </span>

                <input type="text"
                       name="tujuan"
                       class="form-control"
                       placeholder="Contoh: Toko Cabang">

            </div>

        </div>

    </div>

</div>

<!-- BUTTON -->

<div class="d-flex gap-3">

<button class="btn btn-danger px-4">

<i class="fa fa-save"></i>

Simpan Data

</button>

<a href="/stok-keluar"
   class="btn btn-outline-secondary px-4">

Batal

</a>

</div>

</form>

</div>

@endsection