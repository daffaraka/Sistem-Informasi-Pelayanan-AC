@extends('clients.dashboard-user.layout-dashboard-user')
@section('content-user')
@section('content-user-title', 'Transaksi Anda')
<div class="container">
    <div class="row py-4">
        <h1 class="text-center">Informasi</h1>
        <div class="col-lg-3 ps-0">
            @if ($transaksi->bukti_pembayaran == null)
                <h4>Belum ada bukti pembayaran</h4>
            @else
                <img class="img-thumbnail" src="{{ asset('User/Bukti Pembayaran/' . $transaksi->bukti_pembayaran) }}"
                    alt="">
            @endif

        </div>
        <div class="col-lg-5 ">

            @if ($transaksi->status = 'Diterima')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transaksi diterima</h5>
                        <p class="card-text">Teknisi akan menuju alamat anda pada tanggal <span class="fw-bold">
                                {{ $transaksi->tanggal_kedatangan }}</span>, Pukul {{ $transaksi->waktu_kedatangan }}
                        </p>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transaksi telah selesai</h5>
                        <p class="card-text">Teknisi telah melakukan pelayanan {{ $transaksi->Layanan->nama_layanan }}
                            pada tanggal <span class="fw-bold"> {{ $transaksi->tanggal_kedatangan }}</span>, Pukul
                            {{ $transaksi->waktu_kedatangan }}. </p>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-lg-4 px-0">
            <div class="card border-0 py-0">
                <div class="card-body px-2 py-0">
                    {{-- <h3 class="card-title py-0"> <label
                            class="badge badge-lg bg-dark rounded-0">{{ $transaksi->Layanan->nama_layanan }}</label>
                    </h3> --}}
                    <div class="bg-light p-3 shadow">
                        <div class="mb-3">
                            <div class="form-label">Jenis Jasa</div>
                            <input type="text" class="form-control" name="Isi reon"
                                value="{{ $transaksi->Layanan->nama_layanan }}" readonly>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Status</div>
                            <input type="text" class="form-control" name="Isi reon" value="{{ $transaksi->status }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Jumlah AC</div>
                            <input type="text" class="form-control" value="{{ $transaksi->jumlah_ac }}" readonly>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Nomor Hp</div>
                            <input type="number" class="form-control" value="{{ $transaksi->nomor_hp }}" readonly>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Penerima Layanan </div>
                            <input type="text" class="form-control" value="{{ $transaksi->penerima_layanan }}"
                                readonly>
                        </div>

                        <div class="mb-3">
                            <div class="form-label">Metode Pembayaran</div>
                            <input type="text" class="form-control" value="{{ $transaksi->metode_pembayaran }}"
                                readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
