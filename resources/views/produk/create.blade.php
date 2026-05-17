@extends('layout')

@section('content')

<!-- HEADER -->

<div class="d-flex
            justify-content-between
            align-items-center
            mb-4">

<div>

<h2 class="fw-bold">

Tambah Produk

</h2>

<p class="text-muted mb-0">

Tambahkan produk inventory baru

</p>

</div>

<a href="/produk"
   class="btn btn-outline-secondary
          rounded-4
          px-4">

<i class="fa fa-arrow-left"></i>

Kembali

</a>

</div>

<!-- VALIDASI ERROR -->

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

<form action="/produk/store"
      method="POST"
      enctype="multipart/form-data">

@csrf

<div class="row">

    <!-- NAMA PRODUK -->

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label fw-semibold">

                Nama Produk

            </label>

            <div class="input-group">

                <span class="input-group-text">

                    <i class="fa fa-box"></i>

                </span>

                <input type="text"
                       name="nama_produk"
                       class="form-control rounded-end"
                       placeholder="Masukkan nama produk"
                       required>

            </div>

        </div>

    </div>

    <!-- KATEGORI -->

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label fw-semibold">

                Kategori

            </label>

            <div class="input-group">

                <span class="input-group-text">

                    <i class="fa fa-tags"></i>

                </span>

                <input type="text"
                       name="kategori"
                       class="form-control rounded-end"
                       placeholder="Masukkan kategori"
                       required>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <!-- STOK -->

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label fw-semibold">

                Jumlah Stok

            </label>

            <div class="input-group">

                <span class="input-group-text">

                    <i class="fa fa-cubes"></i>

                </span>

                <input type="number"
                       name="stok"
                       class="form-control rounded-end"
                       placeholder="Masukkan jumlah stok"
                       required>

            </div>

        </div>

    </div>

    <!-- HARGA -->

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label fw-semibold">

                Harga Produk

            </label>

            <div class="input-group">

                <span class="input-group-text">

                    Rp

                </span>

                <input type="number"
                       name="harga"
                       class="form-control rounded-end"
                       placeholder="Masukkan harga produk"
                       required>

            </div>

        </div>

    </div>

</div>

<!-- GAMBAR -->

<div class="mb-4">

<label class="form-label fw-semibold">

    Upload Gambar Produk

</label>

<input type="file"
       name="gambar"
       class="form-control"
       accept="image/*"
       onchange="previewImage(event)"
       required>

<!-- PREVIEW -->

<div class="mt-4 text-center">

<img id="preview"
     src="https://via.placeholder.com/180x180?text=Preview"
     width="180"
     height="180"
     class="rounded-4
            shadow-sm
            border"
     style="
     object-fit:cover;
     ">

</div>

</div>

<!-- BUTTON -->

<div class="d-flex gap-3">

<button class="btn btn-dark
               rounded-4
               px-4
               py-2">

<i class="fa fa-save"></i>

Simpan Produk

</button>

<a href="/produk"
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

<!-- PREVIEW IMAGE -->

<script>

function previewImage(event){

    const image =
    document.getElementById('preview');

    image.src =
    URL.createObjectURL(
        event.target.files[0]
    );
}

</script>

@endsection