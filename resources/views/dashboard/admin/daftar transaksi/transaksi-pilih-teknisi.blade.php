@extends('dashboard.layout-dashboard')
@section('page-title', 'Pilih Teknisi')
@section('content')
    <div class="container">
        <form action="{{ route('admin.terimaTransaksi', $transaksi->id_transaksi) }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-lg-5">
                    <div class="bg-light p-3">
                        <div class="mb-3">
                            <label for="">Pilih teknisi untuk dikirim menuju tujuan</label>
                            <select name="id_teknisi" id="" class="form-control">
                                @foreach ($teknisi as $data)
                                    <option value="{{ $data->id_teknisi }}">{{ $data->nama_teknisi }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                </div>
                <div class="col-lg-5 ">
                    <div class="bg-light p-3">
                        <div class="mb-3">
                            <div class="form-label">Jenis Jasa</div>
                            <input type="text" class="form-control" value="{{ $transaksi->Layanan->nama_layanan }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Alamat</div>
                            <input type="text" class="form-control" value="{{ $transaksi->alamat }}" readonly>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Nomor HP</div>
                            <input type="text" class="form-control" value="{{ $transaksi->nomor_hp }}" readonly>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-10 mt-4">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-block btn-info px-5 text-light">Submit</button>
    
                </div>
            </div>
          
        </form>
    </div>
@endsection
