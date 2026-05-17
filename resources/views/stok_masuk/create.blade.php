@extends('layout')

@section('content')

<!-- HEADER -->

<div class="d-flex
            justify-content-between
            align-items-center
            mb-4">

<div>

<h2 class="fw-bold">

Tambah Stok Masuk

</h2>

<p class="text-muted mb-0">

Tambahkan barang masuk dari supplier

</p>

</div>

<a href="/stok-masuk"
   class="btn btn-outline-secondary
          rounded-4
          px-4">

<i class="fa fa-arrow-left"></i>

Kembali

</a>

</div>

<!-- ERROR VALIDASI -->

@if($errors->any())

<div class="alert alert-danger
            rounded-4">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<!-- FORM -->

<div class="table-card">

<form action="/stok-masuk/store"
      method="POST">

@csrf

<div class="row">

    <!-- PRODUK -->

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label fw-semibold">

                Produk

            </label>

            <select name="produk_id"
                    class="form-control"
                    required>

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

    <!-- SUPPLIER -->

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label fw-semibold">

                Supplier

            </label>

            <select name="supplier_id"
                    class="form-control"
                    required>

                <option value="">

                    -- Pilih Supplier --

                </option>

                @foreach($supplier as $s)

                <option value="{{ $s->id }}">

                    {{ $s->nama_supplier }}

                </option>

                @endforeach

            </select>

        </div>

    </div>

</div>

<div class="row">

    <!-- JUMLAH -->

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label fw-semibold">

                Jumlah Barang

            </label>

            <input type="number"
                   name="jumlah"
                   class="form-control"
                   placeholder="Masukkan jumlah"
                   required>

        </div>

    </div>

    <!-- TANGGAL -->

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label fw-semibold">

                Tanggal Masuk

            </label>

            <input type="date"
                   name="tanggal"
                   class="form-control"
                   required>

        </div>

    </div>

</div>

<!-- KETERANGAN -->

<div class="mb-4">

<label class="form-label fw-semibold">

    Keterangan

</label>

<input type="text"
       name="keterangan"
       class="form-control"
       placeholder="Contoh: Restock Gudang">

</div>

<!-- BUTTON -->

<div class="d-flex gap-3">

<button class="btn btn-success
               rounded-4
               px-4
               py-2">

<i class="fa fa-save"></i>

Simpan

</button>

<a href="/stok-masuk"
   class="btn btn-outline-secondary
          rounded-4
          px-4
          py-2">

Batal

</a>

</div>

</form>

</div>

<!-- SWEET ALERT -->

@if(session('success'))

<script src=
"https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

Swal.fire({

    icon:'success',

    title:'Berhasil',

    text:'{{ session('success') }}',

    showConfirmButton:false,

    timer:2000

});

</script>

@endif

@endsection