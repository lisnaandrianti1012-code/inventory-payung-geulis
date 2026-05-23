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

                Data Supplier

            </h3>

            <p class="text-muted mb-0">

                Kelola data supplier inventory Payung Geulis

            </p>

        </div>

        <a href="/supplier/create"
           class="btn btn-warning rounded-4 px-4 shadow-sm">

            <i class="fa fa-plus"></i>

            Tambah Supplier

        </a>

    </div>

    <!-- SEARCH -->

    <form method="GET"
          action="/supplier"
          class="mb-4">

        <div class="input-group shadow-sm">

            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   class="form-control rounded-start-4 border-0"
                   placeholder="Cari nama supplier atau alamat...">

            <button class="btn btn-dark rounded-end-4 px-4">

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

                    <th>Nama Supplier</th>

                    <th>Kategori Supplier</th>

                    <th>Alamat</th>

                    <th>No HP</th>

                    <th width="120">

                        Aksi

                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($supplier as $s)

                <tr>

                    <td>

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        <div class="fw-semibold">

                            {{ $s->nama_supplier }}

                        </div>

                    </td>

                    <!-- KATEGORI SUPPLIER -->

                    <td>

                        <span class="badge
                                     bg-warning
                                     text-dark
                                     px-3
                                     py-2
                                     rounded-pill">

                            {{ $s->jenis_supplier }}

                        </span>

                    </td>

                    <td>

                        {{ $s->alamat }}

                    </td>

                    <td>

                        {{ $s->no_hp }}

                    </td>

                    <td>

                        <div class="d-flex gap-2">

                            <!-- EDIT -->

                            <a href="/supplier/edit/{{ $s->id }}"
                               class="btn btn-primary btn-sm rounded-3">

                                <i class="fa fa-pen"></i>

                            </a>

                            <!-- DELETE -->

                            <a href="/supplier/delete/{{ $s->id }}"
                               class="btn btn-danger btn-sm rounded-3"
                               onclick="confirmDelete(event,this.href)">

                                <i class="fa fa-trash"></i>

                            </a>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="text-center py-5 text-muted">

                        <i class="fa fa-box-open fa-2x mb-3"></i>

                        <br>

                        Data supplier tidak ditemukan

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection