@extends('clients.dashboard-user.layout-dashboard-user')
@section('content-user')
@section('content-user-title', 'Transaksi Anda')
<div class="container">
    <div class="row">
        <div class="col-lg-6 px-0">
            <div class="card border-0">
                <div class="card-body px-2">
                    <h3 class="card-title"> <label
                            class="badge badge-lg bg-dark rounded-0">{{ $transaksi->Layanan->nama_layanan }}</label>
                    </h3>
                    <p class="card-text">Content</p>
                </div>
            </div>
        </div>
        <div class="col">
            @if ($transaksi->bukti_pembayaran == null)
                <h4>Belum ada bukti pembayaran</h4>
            @else
                <img class="img-thumbnail" src="" alt="">
            @endif

        </div>
    </div>
</div>
@endsection
