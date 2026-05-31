@extends('layout')

@section('content')

<div class="table-card">

    <!-- HEADER -->

    <div class="d-flex
                justify-content-between
                align-items-center
                mb-4">

        <div>

            <h3 class="fw-bold mb-1">

                Tambah Supplier

            </h3>

            <p class="text-muted mb-0">

                Tambahkan data supplier inventory Payung Geulis

            </p>

        </div>

    </div>

    <!-- FORM -->

    <form action="/supplier/store"
          method="POST">

        @csrf

        <!-- NAMA SUPPLIER -->

        <div class="mb-3">

            <label class="form-label fw-semibold">

                Nama Supplier

            </label>

            <input type="text"
                   name="nama_supplier"
                   class="form-control rounded-4"
                   placeholder="Masukkan nama supplier"
                   required>

        </div>

        <!-- KATEGORI SUPPLIER -->

        <div class="mb-3">

            <label class="form-label fw-semibold">

                Kategori Supplier

            </label>

            <select
                name="jenis_supplier"
                class="form-control rounded-4"
                required>

                <option value="">

                    -- Pilih Kategori Supplier --

                </option>

                <option value="Kayu">

                    Supplier Kayu

                </option>

                <option value="Kain">

                    Supplier Kain

                </option>

                <option value="Cat">

                    Supplier Cat

                </option>

                <option value="Aksesoris">

                    Supplier Aksesoris

                </option>

                <option value="Packaging">

                    Supplier Packaging

                </option>

            </select>

        </div>

        <!-- ALAMAT -->

        <div class="mb-3">

            <label class="form-label fw-semibold">

                Alamat

            </label>

            <textarea
                name="alamat"
                class="form-control rounded-4"
                rows="4"
                placeholder="Masukkan alamat supplier"
                required></textarea>

        </div>

        <!-- NO HP -->

        <div class="mb-4">

            <label class="form-label fw-semibold">

                No HP

            </label>

            <input type="text"
                   name="no_hp"
                   class="form-control rounded-4"
                   placeholder="Masukkan nomor HP"
                   required>

        </div>

        <!-- BUTTON -->

        <div class="d-flex gap-2">

            <button class="btn btn-warning
                           rounded-4
                           px-4">

                <i class="fa fa-save"></i>

                Simpan Supplier

            </button>

            <a href="/supplier"
               class="btn btn-dark
                      rounded-4
                      px-4">

                <i class="fa fa-arrow-left"></i>

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection