@extends('dashboard.layout-dashboard')
@section('page-title', 'Detail Transaksi')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                @if (empty($transaksi->bukti_pembayaran))
                    <div class="card px-2 py-4 text-center shadow">
                        <h3 class="fw-bold">Belum ada bukti</h3>
                    </div>
                    <button class="btn btn-danger fw-bold">Anda belum bisa memberikan aksi dikarenakan pelanggan belum
                        memberi bukti pembayaran</button>
                @else
                    @if (!$transaksi->id_teknisi)
                        <h4>Bukti Pembayaran</h4>
                        <img class="img-thumbnail p-4"
                            src="{{ asset('User/Bukti Pembayaran/' . $transaksi->bukti_pembayaran) }}" alt="">
                        <div class="my-3">
                            <a href="{{ route('admin.pilihTeknisi', $transaksi->id_transaksi) }}"
                                class="btn btn-info w-100 d-block">Terima Permintaan</a>

                            <form action="{{ route('admin.tolakTransaksi', $transaksi->id_transaksi) }}" class="mt-2"
                                method="post">
                                @csrf
                                <button type="submit" class="btn btn-warning w-100 d-block text-dark">Tolak
                                    Permintaan</button>
                                <br>
                            </form>
                        </div>
                    @elseif ($transaksi->status = 'Diterima')
                    <h4>Bukti Pembayaran</h4>
                    <img class="img-thumbnail p-4"
                        src="{{ asset('User/Bukti Pembayaran/' . $transaksi->bukti_pembayaran) }}" alt="">
                        <div class="my-3 py-3 text-center bg-light ">
                            <p class="mb-0 px-2 fw-bold">Transaksi diterima. teknisi sedang menuju alamat yang sudah didaftarkan.</p>
                        </div>
                    @else
                    <h4>Bukti Pembayaran</h4>
                    <img class="img-thumbnail p-4"
                        src="{{ asset('User/Bukti Pembayaran/' . $transaksi->bukti_pembayaran) }}" alt="">
                        <div class="my-3 py-3 text-center bg-light ">
                            <p class="mb-0 fw-bold">Transaksi selesai. User akan segera memberi ulasan.</p>
                        </div>
                    @endif

                @endif

            </div>
            <div class="col-lg-6">
                <h4>Informasi Transaksi</h4>
                <div class="bg-light p-3">
                    <div class="mb-3">
                        <div class="form-label">Jenis Jasa</div>
                        <input type="text" class="form-control" name="Isi reon"
                            value="{{ $transaksi->Layanan->nama_layanan }}" readonly>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Teknisi</div>
                        <input type="text" class="form-control" name="Isi reon"
                            value="{{ $transaksi->Layanan->nama_layanan }}" readonly>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Status</div>
                        <input type="text" class="form-control" name="Isi reon"
                            value="{{ $transaksi->Layanan->nama_layanan }}" readonly>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Alamat</div>
                        <input type="text" class="form-control" name="Isi reon" value="{{ $transaksi->alamat }}"
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
                        <input type="text" class="form-control" value="{{ $transaksi->penerima_layanan }}" readonly>
                    </div>

                    <div class="mb-3">
                        <div class="form-label">Metode Pembayaran</div>
                        <input type="text" class="form-control"
                            value="{{ $transaksi->metode_pembayaran ? $transaksi->metode_pembayaran : 'Belum ada' }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Tanggal Kedatangan</div>
                        <input type="text" class="form-control"
                            value="{{ $transaksi->tanggal_kedatangan }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Waktu Kedatangan</div>
                        <input type="text" class="form-control"
                            value="{{ $transaksi->waktu_kedatangan }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Garansi</div>
                        <input type="date" class="form-control" value="{{ $transaksi->garansi }}" readonly>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
