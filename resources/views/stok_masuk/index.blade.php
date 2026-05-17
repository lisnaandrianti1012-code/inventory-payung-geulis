@extends('layout')

@section('content')

<div class="table-card">

    <!-- HEADER -->

    <div class="d-flex
                justify-content-between
                align-items-center
                flex-wrap
                gap-3
                mb-4">

        <div>

            <h3 class="fw-bold mb-1">

                Data Stok Masuk

            </h3>

            <p class="text-muted mb-0">

                Monitoring barang masuk inventory

            </p>

        </div>

        <a href="/stok-masuk/create"
           class="btn btn-success rounded-4 px-4">

            <i class="fa fa-plus"></i>

            Tambah Stok

        </a>

    </div>

    <!-- SEARCH -->

    <form method="GET"
          action="/stok-masuk"
          class="mb-4">

        <div class="input-group">

            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   class="form-control rounded-start-4"
                   placeholder="Cari produk, supplier, atau tanggal...">

            <button class="btn btn-dark rounded-end-4">

                <i class="fa fa-search"></i>

                Cari

            </button>

        </div>

    </form>

    <!-- TABLE -->

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead class="table-light">

                <tr>

                    <th>No</th>
                    <th>Produk</th>
                    <th>Supplier</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>

                </tr>

            </thead>

            <tbody>

                @forelse($stokMasuk as $s)

                <tr>

                    <td>

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        <div class="fw-semibold">

                            {{ $s->produk->nama_produk }}

                        </div>

                    </td>

                    <td>

                        {{ $s->supplier->nama_supplier }}

                    </td>

                    <td>

                        <span class="badge
                                     bg-success
                                     px-3
                                     py-2">

                            +{{ $s->jumlah }}

                        </span>

                    </td>

                    <td>

                        {{ $s->tanggal }}

                    </td>

                    <td>

                        {{ $s->keterangan }}

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="text-center py-4 text-muted">

                        Data stok masuk tidak ditemukan

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection