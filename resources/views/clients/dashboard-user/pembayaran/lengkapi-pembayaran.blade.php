@extends('clients.dashboard-user.layout-dashboard-user')
@section('content-user')
@section('content-user-title', 'Lengkapi Transaksi Anda')
<div class="container px-0">
    <form action="{{route('storeBuktiPembayaran',$transaksi->id_transaksi)}}" method="POST" enctype="multipart/form-data">
        <p>Pastikan anda telah mengirim gambar dari bukti pembayaran untuk dikonfirmasi lebih lanjut</p>
        @csrf
        <div class="mb-3 d-flex justify-content-center">
            <img class="img-thumbnail w-50 mb-3" src="{{ asset('image/aset/image-preview.png') }}" alt="" id="gambar-sebelum-upload">
          
        </div>

        <div class="mb-3">
            <input class="form-control" type="file" id="buktiPembayaran" name="bukti_pembayaran">
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
