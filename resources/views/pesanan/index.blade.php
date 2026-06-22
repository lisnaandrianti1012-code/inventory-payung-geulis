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

                        {{ $item->produk }}

                    </td>

                    <!-- QTY -->

                    <td>

                        <span class="badge
                                     bg-primary
                                     rounded-pill
                                     px-3
                                     py-2">

                            {{ $item->jumlah }}

                        </span>

                    </td>

                    <!-- TOTAL -->

                    <td class="fw-bold text-success">

                        Rp {{ number_format($item->total_harga) }}

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

                        @elseif($item->status == 'Dikirim')

                            <span class="badge
                                         bg-info
                                         text-dark
                                         px-3
                                         py-2">

                                Dikirim

                            </span>

                        @elseif($item->status == 'Selesai')

                            <span class="badge
                                         bg-success
                                         px-3
                                         py-2">

                                Selesai

                            </span>

                        @else

                            <span class="badge
                                         bg-secondary
                                         px-3
                                         py-2">

                                {{ $item->status }}

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
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $item->id }}"
                                class="btn btn-primary
                                       btn-sm
                                       rounded-3">

                                <i class="fa fa-eye"></i>

                            </button>

                            <!-- DELETE -->

                            <a href="/pesanan/delete/{{ $item->id }}"
                               class="btn btn-danger
                                      btn-sm
                                      rounded-3"
                               onclick="confirmDelete(event,this.href)">

                                <i class="fa fa-trash"></i>

                            </a>

                        </div>

                        <!-- Modal Detail Pesanan -->
                        <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded-4 border-0 shadow-lg text-start">
                                    <div class="modal-header border-0 pb-0">
                                        <h5 class="modal-title fw-bold" id="detailModalLabel{{ $item->id }}">Detail Pesanan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('pesanan.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body pt-3">
                                            <div class="mb-3">
                                                <label class="text-muted d-block mb-1 fs-6">Nama Customer</label>
                                                <div class="fw-semibold text-dark fs-5">{{ $item->nama_customer }}</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="text-muted d-block mb-1 fs-6">Produk</label>
                                                <div class="fw-semibold text-dark fs-5">{{ $item->produk }}</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <label class="text-muted d-block mb-1 fs-6">Jumlah (Qty)</label>
                                                    <div class="fw-semibold text-dark fs-5">{{ $item->jumlah }} pcs</div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="text-muted d-block mb-1 fs-6">Total Harga</label>
                                                    <div class="fw-bold text-success fs-5">Rp {{ number_format($item->total_harga) }}</div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="text-muted d-block mb-1 fs-6">Alamat Pengiriman</label>
                                                <div class="text-dark fs-5">{{ $item->alamat }}</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="text-muted d-block mb-1 fs-6">Tanggal Pesanan</label>
                                                <div class="text-dark fs-5">{{ $item->created_at->format('d M Y, H:i') }}</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="status-{{ $item->id }}" class="text-muted d-block mb-1 fs-6">Status Pesanan</label>
                                                <select name="status" id="status-{{ $item->id }}" class="form-select rounded-3">
                                                    <option value="Pending" {{ $item->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="Diproses" {{ $item->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                                    <option value="Dikirim" {{ $item->status == 'Dikirim' ? 'selected' : '' }}>Dikirim</option>
                                                    <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0 pt-0">
                                            <button type="button" class="btn btn-light rounded-3 px-4" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-warning text-dark fw-semibold rounded-3 px-4 shadow-sm">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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