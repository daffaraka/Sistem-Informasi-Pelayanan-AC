@extends('clients.dashboard-user.layout-dashboard-user')
@section('content-user')
@section('content-user-title', 'Lengkapi Transaksi Anda')
<div class="container px-0">
    <form action="{{ route('storeBuktiPembayaran', $transaksi->id_transaksi) }}" method="POST"
        enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <p class="card-text">
                    Silahkan lengkapi transaksi anda dengan melakukan pembayaran
                    pada Virtual Account <span class="fw-bold"> {{ $transaksi->metode_pembayaran }} </span> :
                    Sejumlah  <span class="fw-bold">Rp. {{ number_format($transaksi->biaya_jasa) }} </span> 
                </p>
                <div class="text-center">
                    <h1 class="fw-bold">0882-1237-8776</h1>
                </div>
                <p class="mt-3">Pastikan anda telah mengirim gambar dari bukti pembayaran untuk dikonfirmasi lebih lanjut</p>

            </div>
        </div>

        @csrf
        <div class="mb-3 my-3 d-flex justify-content-center">
            <img class="img-thumbnail w-50" src="{{ asset('image/aset/image-preview.png') }}" alt=""
                id="gambar-sebelum-upload">

        </div>

        <div class="mb-3">
            <input class="form-control" type="file" accept="image/*" id="buktiPembayaran" name="bukti_pembayaran">
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>



</div>

@endsection
@push('script')
<script>
    $(document).ready(function(e) {


        $('#buktiPembayaran').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#gambar-sebelum-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    });
</script>
@endpush
