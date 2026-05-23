@extends('layout')

@section('content')

<style>

    .produk-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
    }

    .produk-title{
        font-size:28px;
        font-weight:700;
        color:#111827;
    }

    .btn-tambah{
        background:linear-gradient(
            135deg,
            #d4af37,
            #f5d06f
        );

        color:#111;

        padding:12px 20px;

        border-radius:12px;

        text-decoration:none;

        font-weight:600;

        transition:0.3s;
    }

    .btn-tambah:hover{

        transform:translateY(-2px);

        box-shadow:0 8px 20px rgba(0,0,0,0.15);

        color:#111;

        text-decoration:none;
    }

    .produk-card{

        background:#fff;

        border-radius:20px;

        padding:25px;

        box-shadow:
        0 10px 25px rgba(0,0,0,0.05);
    }

    .table{

        border-collapse:separate;
        border-spacing:0 12px;
    }

    .table thead tr th{

        border:none;

        color:#6b7280;

        font-size:14px;

        text-transform:uppercase;

        letter-spacing:1px;
    }

    .table tbody tr{

        background:#f9fafb;

        transition:0.3s;

        border-radius:16px;
    }

    .table tbody tr:hover{

        transform:scale(1.01);

        box-shadow:
        0 5px 15px rgba(0,0,0,0.06);
    }

    .table tbody td{

        padding:18px;

        border:none;

        vertical-align:middle;
    }

    .produk-img{

        width:60px;

        height:60px;

        object-fit:cover;

        border-radius:12px;
    }

    .badge-stok{

        background:#dcfce7;

        color:#166534;

        padding:8px 14px;

        border-radius:30px;

        font-size:13px;

        font-weight:600;
    }

    .harga{

        color:#16a34a;

        font-weight:700;
    }

    .btn-action{

        width:38px;

        height:38px;

        border:none;

        border-radius:10px;

        color:#fff;

        margin-right:5px;
    }

    .btn-edit{

        background:#2563eb;
    }

    .btn-delete{

        background:#dc2626;
    }

</style>

<div class="produk-card">

    <!-- HEADER -->

    <div class="produk-header">

        <div>

            <h2 class="produk-title">

                Produk Customer

            </h2>

            <p class="text-muted mb-0">

                Data produk realtime customer Payung Geulis

            </p>

        </div>

        <a href="{{ url('produk-customer/create') }}"
           class="btn-tambah">

            <i class="fa fa-plus"></i>

            Tambah Produk

        </a>

    </div>

    <!-- TABLE -->

    <div class="table-responsive">

        <table class="table align-middle">

            <thead>

                <tr>

                    <th>No</th>

                    <th>Gambar</th>

                    <th>Nama Produk</th>

                    <th>Harga</th>

                    <th>Stok</th>

                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($produk as $item)

                <tr>

                    <td>

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        <img
                            src="{{ asset('storage/' . $item->gambar) }}"
                            class="produk-img">

                    </td>

                    <td>

                        <div class="fw-bold">

                            {{ $item->nama_produk }}

                        </div>

                        <small class="text-muted">

                            Produk Customer

                        </small>

                    </td>

                    <td class="harga">

                        Rp {{ number_format($item->harga) }}

                    </td>

                    <td>

                        <span class="badge-stok">

                            {{ $item->stok }} Stok

                        </span>

                    </td>

                    <td>

                        <a href="{{ url('produk-customer/' . $item->id . '/edit') }}">

                            <button class="btn-action btn-edit">

                                <i class="fa fa-pen"></i>

                            </button>

                        </a>

                        <a href="{{ url('produk-customer/' . $item->id) }}">

                            <button class="btn-action btn-delete">

                                <i class="fa fa-trash"></i>

                            </button>

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="text-center">

                        Data produk kosong

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection