```php
@extends('layout')

@section('content')

<div class="table-card">

    <h3 class="fw-bold mb-4">

        Edit Produk Customer

    </h3>

    <form action="{{ route('produk-customer.update', $produk->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <!-- Nama Produk -->

        <div class="mb-3">

            <label class="form-label">

                Nama Produk

            </label>

            <input type="text"
                   name="nama_produk"
                   class="form-control"
                   value="{{ $produk->nama_produk }}"
                   required>

        </div>

        <!-- Harga -->

        <div class="mb-3">

            <label class="form-label">

                Harga

            </label>

            <input type="number"
                   name="harga"
                   class="form-control"
                   value="{{ $produk->harga }}"
                   required>

        </div>

        <!-- Stok -->

        <div class="mb-3">

            <label class="form-label">

                Stok

            </label>

            <input type="number"
                   name="stok"
                   class="form-control"
                   value="{{ $produk->stok }}"
                   required>

        </div>

        <!-- Deskripsi -->

        <div class="mb-3">

            <label class="form-label">

                Deskripsi

            </label>

            <textarea name="deskripsi"
                      class="form-control"
                      rows="4"
                      required>{{ $produk->deskripsi }}</textarea>

        </div>

        <!-- Gambar Lama -->

        <div class="mb-3">

            <label class="form-label">

                Gambar Saat Ini

            </label>

            <br>

            @if ($produk->gambar)

                <img
                    src="{{ asset('storage/' . $produk->gambar) }}"
                    width="150"
                    class="rounded shadow-sm mt-2">

            @else

                <p class="text-muted">

                    Tidak ada gambar

                </p>

            @endif

        </div>

        <!-- Gambar Baru -->

        <div class="mb-4">

            <label class="form-label">

                Ganti Gambar

            </label>

            <input type="file"
                   name="gambar"
                   class="form-control">

        </div>

        <!-- Tombol -->

        <button type="submit"
                class="btn-premium">

            Update Produk

        </button>

        <a href="{{ route('produk-customer.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

@endsection
```
