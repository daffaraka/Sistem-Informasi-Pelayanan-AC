@extends('clients.dashboard-user.layout-dashboard-user')
@section('content-user')
@section('content-user-title', 'Transaksi Anda')
<div class="container">
    <div class="row">
        @foreach ($transaksiUser as $transaksi)
            <div class="col-lg-10 px-0 my-1 ">
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
                                <div class="card-footer px-0 {{$transaksi->status =='AKTIF' ? 'bg-light' : ($transaksi->status == 'Diterima' ? 'bg-primary' : 'bg-danger') }}">
                                    <h6 class="fw-bold">{{$transaksi->status}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="text-primary fw-bold text-uppercase"> <label
                                    class="badge bg-primary rounded-0">{{ $transaksi->Layanan->nama_layanan }} </label>
                            </h6>
                            <i class="fa fa-map-pin" aria-hidden="true"></i> <span>{{ $transaksi->alamat }}</span> <br>
                            <i class="fa fa-clock" aria-hidden="true"></i>
                            <span>{{ $transaksi->waktu_kedatangan }}</span> <br>
                            <div class="mt-2 d-flex justify-content-end">
                                @if ($transaksi->bukti_pembayaran == null)
                                    <a href="{{route('upload-pembayaran',$transaksi->id_transaksi)}}" class="btn btn-sm btn-outline-primary">Lengkapi Pembayaran</a>
                                @else
                                    <a href="#" class="btn btn-sm btn-primary">Beri Review</a>
                                @endif

                                <a href="{{route('user.detailTransaksi-user',$transaksi->id_transaksi)}}" class="btn btn-sm btn-warning mx-1">Detail</a>
                                <div class="btn btn-sm btn-danger">Batalkan</div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>
@endsection
