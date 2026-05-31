@extends('layout')

@section('content')

<div class="table-card">

    <h3 class="fw-bold mb-4">

        Tambah Produk Customer

    </h3>

    <form action="/produk-customer"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">

            <label>

                Nama Produk

            </label>

            <input type="text"
                   name="nama_produk"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>

                Harga

            </label>

            <input type="number"
                   name="harga"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>

                Stok

            </label>

            <input type="number"
                   name="stok"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>

                Deskripsi

            </label>

            <textarea name="deskripsi"
                      class="form-control"></textarea>

        </div>

        <div class="mb-3">

            <label>

                Gambar

            </label>

            <input type="file"
                   name="gambar"
                   class="form-control">

        </div>

        <button class="btn-premium">

            Simpan Produk

        </button>

    </form>

</div>

@endsection