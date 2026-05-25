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

                Pesanan Customer

            </h3>

            <p class="text-muted mb-0">

                Data pesanan customer realtime dari aplikasi Flutter

            </p>

        </div>

        <a href="#"
           class="btn btn-warning rounded-4 px-4 shadow-sm">

            <i class="fa fa-cart-plus"></i>

            Data Pesanan

        </a>

    </div>

    <!-- SEARCH -->

    <form method="GET"
          action="/pesanan"
          class="mb-4">

        <div class="input-group shadow-sm">

            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   class="form-control
                          rounded-start-4
                          border-0"

                   placeholder="Cari nama customer atau produk...">

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

                    <th>Customer</th>

                    <th>Produk</th>

                    <th>Qty</th>

                    <th>Total</th>

                    <th>Status</th>

                    <th>Tanggal</th>

                    <th width="120">

                        Aksi

                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($pesanan as $item)

                <tr>

                    <!-- NOMOR -->

                    <td>

                        {{ $loop->iteration }}

                    </td>

                    <!-- CUSTOMER -->

                    <td>

                        <div class="fw-semibold">

                            {{ $item->nama_customer }}

                        </div>

                    </td>

                    <!-- PRODUK -->

                    <td>

                        {{ $item->nama_produk }}

                    </td>

                    <!-- QTY -->

                    <td>

                        <span class="badge
                                     bg-primary
                                     rounded-pill
                                     px-3
                                     py-2">

                            {{ $item->qty }}

                        </span>

                    </td>

                    <!-- TOTAL -->

                    <td class="fw-bold text-success">

                        Rp {{ number_format($item->total) }}

                    </td>

                    <!-- STATUS -->

                    <td>

                        @if($item->status == 'Pending')

                            <span class="badge
                                         bg-warning
                                         text-dark
                                         px-3
                                         py-2">

                                Pending

                            </span>

                        @elseif($item->status == 'Diproses')

                            <span class="badge
                                         bg-primary
                                         px-3
                                         py-2">

                                Diproses

                            </span>

                        @else

                            <span class="badge
                                         bg-success
                                         px-3
                                         py-2">

                                Selesai

                            </span>

                        @endif

                    </td>

                    <!-- TANGGAL -->

                    <td>

                        {{ $item->created_at
                                ->format('d M Y') }}

                    </td>

                    <!-- AKSI -->

                    <td>

                        <div class="d-flex gap-2">

                            <!-- DETAIL -->

                            <button
                                class="btn btn-primary
                                       btn-sm
                                       rounded-3">

                                <i class="fa fa-eye"></i>

                            </button>

                            <!-- DELETE -->

                            <a href="/pesanan/delete/{{ $item->id }}"
                               class="btn btn-danger
                                      btn-sm
                                      rounded-3">

                                <i class="fa fa-trash"></i>

                            </a>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8"
                        class="text-center
                               py-5
                               text-muted">

                        <i class="fa fa-box-open
                                  fa-2x
                                  mb-3"></i>

                        <br>

                        Belum ada pesanan customer

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection