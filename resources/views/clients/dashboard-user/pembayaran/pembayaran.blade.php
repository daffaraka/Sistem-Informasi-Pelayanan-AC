@extends('clients.client-layout')
@section('title', 'Pembayaran')
@section('content')
    <div class="container-fluid">
        <div class="container py-3">
            <div class="row border px-3">
                <h3 class="fw-bold my-2 px-2">Lengkapi Pembayaran anda</h3> <br>
                <div class="px-2">
                    <div class="line-full d-inline-block"></div>
                </div>

                <div class="col-lg-8 my-3 px-2 pe-5 py-3 border-1">

                    <form action="{{ route('pilih_metode',$detailTransaksi->id_transaksi) }}" method="POST">
                        <h5 class="card-title">Pilih Metode Pembayaran</h5>
                        <hr>
                        @csrf
                        <div class="form-check my-3 payment-method">
                            <input class="form-check-input my-3" type="radio" name="metode_pembayaran" value="Gopay">
                            <label class="form-check-label mx-2" for="flexRadioDefault1">
                                <img class="img-payment border-0 " src="{{ asset('image/payment/logo-gopay.png') }}"
                                    alt="">
                            </label>
                        </div>
                        <div class="form-check my-3 payment-method">
                            <input class="form-check-input my-2" type="radio" name="metode_pembayaran" value="OVO">
                            <label class="form-check-label mx-2" for="flexRadioDefault1">
                                <img class="img-payment border-0 " src="{{ asset('image/payment/ovo.png') }}"
                                    alt="">
                            </label>
                        </div>
                        <div class="form-check my-3 payment-method">
                            <input class="form-check-input my-4" type="radio" name="metode_pembayaran" value="Dana">
                            <label class="form-check-label mx-2" for="flexRadioDefault1">
                                <img class="img-payment border-0 " src="{{ asset('image/payment/Dana.jpeg') }}"
                                    alt="">
                            </label>
                        </div>
                        <div class="d-grid gap-2 mt-5">
                            <button class="btn btn-primary" type="submit">Menuju pembayaran </button>
                        </div>
                    </form>


                </div>

                {{-- metode Pembayaran --}}
                <div class="col-lg-4 my-3 p-0"> 
                    <div class="card rounded-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Detail transaksi anda</h5>
                            <hr>
                            <h5>{{ $detailTransaksi->Layanan->nama_layanan }}</h5>
                            <p>
                                <span>{{$detailTransaksi->jumlah_ac}} buah AC</span> <br>
                             
                                <span>{{$detailTransaksi->penerima_layanan}}</span> <br>
                                <span>{{$detailTransaksi->nomor_hp}}</span> <br>
                            </p>
                            <div class="form-group">
                                <label for="my-textarea">Alamat</label>
                                <textarea id="my-textarea" class="form-control w-75" name="" rows="3" disabled>{{$detailTransaksi->alamat}}</textarea>
                            </div>
    
    
    
                        </div>
                    </div>
                  

                    {{-- <div class="card-footer">
                        <div class="btn btn-primary fw-bold">Bayar Sekarang</div>

                    </div> --}}

                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    {{-- <script>
        $(function() {
            $("button[type='submit']").click(function() {
                var check = true;
                $("input:radio").each(function() {
                    var name = $(this).attr("name");
                    if ($("input:radio[name=" + name + "]:checked").length == 0) {
                        check = false;
                    }

                });
                if (check) {
                    '';
                } else {
                    // $("form").on("submit", function(e) {
                    //     e.preventDefault();

                    // });

                    alert('Please select at least one answer in each question.');
                   // $("form").on("submit", function(e) {
                    //     e.preventDefault();

                    // });

                }


            });
        });
    </script> --}}
@endpush
