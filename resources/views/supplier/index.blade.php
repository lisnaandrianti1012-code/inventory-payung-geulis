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

                Kelola data supplier inventory

            </p>

        </div>

        <a href="/supplier/create"
           class="btn btn-warning rounded-4 px-4">

            <i class="fa fa-plus"></i>

            Tambah Supplier

        </a>

    </div>

    <!-- SEARCH -->

    <form method="GET"
          action="/supplier"
          class="mb-4">

        <div class="input-group">

            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   class="form-control rounded-start-4"
                   placeholder="Cari nama supplier atau alamat...">

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
                    <th>Nama Supplier</th>
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

                    <td>

                        {{ $s->alamat }}

                    </td>

                    <td>

                        {{ $s->no_hp }}

                    </td>

                    <td>

                        <a href="/supplier/delete/{{ $s->id }}"
                           class="btn btn-danger btn-sm rounded-3"
                           onclick="confirmDelete(event,this.href)">

                            <i class="fa fa-trash"></i>

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="text-center py-4 text-muted">

                        Data supplier tidak ditemukan

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection