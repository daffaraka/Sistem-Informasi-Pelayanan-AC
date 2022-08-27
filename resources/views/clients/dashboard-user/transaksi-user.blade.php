@extends('clients.dashboard-user.layout-dashboard-user')
@section('title', 'Transaksi anda')
@section('content-user')
@section('content-user-title')
    <div class="container">
        <div class="row d-flex justify-content-center">
            @if (!$transaksiUser)
                <h1 class="text-center">Anda belum melakukan transaksi</h1>
            @else
                @foreach ($transaksiUser as $transaksi)
                    <div class="col-lg-8 px-0 my-1 ">
                        <div class="card rounded-0 bg-light">
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <div class="card rounded-0 text-center">
                                        <div class="card-body p-2">
                                            <h4 class="fw-bold">
                                                {{ \Carbon\Carbon::parse($transaksi->tanggal_kedatangan)->locale('id')->isoFormat('dddd') }}
                                            </h4>
                                            <h6>{{ \Carbon\Carbon::parse($transaksi->tanggal_kedatangan)->locale('id')->isoFormat('D,MMM,YY') }}
                                            </h6>

                                        </div>
                                        <div
                                            class="card-footer rounded-b px-0 {{ (($transaksi->status == 'Diajukan'
                                                        ? 'bg-light'
                                                        : $transaksi->status == 'Diterima')
                                                    ? 'bg-primary'
                                                    : $transaksi->status == 'Selesai')
                                                ? 'bg-success text-light'
                                                : 'bg-warning ' }}">
                                            <h6 class="fw-bold">{{ $transaksi->status }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <h6 class="text-primary fw-bold text-uppercase"> <label
                                            class="badge bg-primary rounded-0">{{ $transaksi->Layanan->nama_layanan }}
                                        </label>
                                    </h6>
                                    <i class="fa fa-map-pin" aria-hidden="true"></i> <span>{{ $transaksi->alamat }}</span>
                                    <br>
                                    <i class="fa fa-clock" aria-hidden="true"></i>
                                    <span>{{ $transaksi->waktu_kedatangan }}</span> <br>
                                    <div class="mt-2 d-flex justify-content-end">
                                        @if ($transaksi->bukti_pembayaran == null)
                                            <a href="{{ route('upload-pembayaran', $transaksi->id_transaksi) }}"
                                                class="btn  btn-outline-primary">Lengkapi Pembayaran</a>
                                        @elseif(!$transaksi->Ulasan)
                                            @if ($transaksi->status == 'Dibatalkan')
                                                <button class="btn btn-default"> Anda membatalkan</button>
                                            @else
                                                <a href="{{ route('user.ulasan', $transaksi->id_transaksi) }}"
                                                    class="btn btn-primary">Beri Review</a>
                                            @endif
                                        @else
                                            <a href="" class="btn"> <i class="fa fa-star text-warning"
                                                    aria-hidden="true"></i> {{ $transaksi->Ulasan->rating }} </a>
                                        @endif

                                        @if ($transaksi->status == 'Selesai')
                                            <a href="{{ route('user.detailTransaksi-user', $transaksi->id_transaksi) }}"
                                                class="btn btn-warning mx-1">Detail</a>
                                        @elseif ($transaksi->status == 'Dibatalkan')
                                            {{-- <form action="{{ route('user.batalTransaksi', $transaksi->id_transaksi) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger mx-1">Batalkan</button>
                                            </form> --}}
                                        @else
                                            <form action="{{ route('user.batalTransaksi', $transaksi->id_transaksi) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger mx-1">Batalkan</button>
                                            </form>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
