@extends('clients.client-layout')
@section('title','Beranda')
@section('content')
<div class="container-fluid py-5" id="banner">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-6" id="information">
                <h1 class="informasi-judul">Keep things cool</h1>
                <div id="informasi-utama">
                    <h4>Pastikan AC rumah anda terjaga dan terawat dengan memakai jasa service AC milik Bengkel
                        Teknik Selamat</h4>

                </div>
                <div id="informasi-lain">
                    <h6>Temukan layanan yang anda butuhkan sekarang</h6>
                </div>
            </div>
            <div class="col-lg-6" id="teknisi">
                <img src="{{ asset('image/ac technician.png') }}" alt="">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-5" id="layanan">

    <div class="container">
        <h1 class="informasi-judul text-center mb-5" id="layanan-kami">Layanan Kami </h1>
        <div class="row justify-content-md-center text-center">
            {{-- Isi Freon --}}
            <div class="col-lg-4 justify-content-center ">
                <a href="{{route('layanan.isi-freon')}}"> <img src="{{ asset('image/freon.png') }}" class="d-block gambar-layanan"
                        alt=""> </a>
                <h6>Isi Freon</h6>
            </div>
            {{-- Service AC --}}
            <div class="col-lg-4 justify-content-center">
                <a href="{{route('layanan.service-ac')}}">
                    <img src="{{ asset('image/air-conditioning.png') }}" class="d-block gambar-layanan"
                        alt="">
                </a>
                <h6>Service AC</h6>
            </div>
            {{-- Cuci AC --}}
            <div class="col-lg-4 justify-content-center">
                <a href="{{route('layanan.cuci-ac')}}">
                    <img src="{{ asset('image/cleaning.png') }}" class=" d-block gambar-layanan" alt="">
                </a>
                <h6>Cuci AC</h6>
            </div>
            {{-- Cuci Besar AC --}}
            <div class="col-lg-4 justify-content-center">
                <a href="{{route('layanan.cuci-besar-ac')}}">
                    <img src="{{ asset('image/cuci besar.png') }}" class="d-block gambar-layanan" alt="">
                </a>
                <h6>Cuci Besar AC </h6>
            </div>
            {{-- Bongkar Pasang AC --}}
            <div class="col-lg-4 justify-content-center">
                <a href="{{route('layanan.bongkar-pasang-ac')}}">
                    <img src="{{ asset('image/maintenance.png') }}" class="d-block gambar-layanan" alt="">
                </a>
                <h6>Bongkar Pasang AC</h6>
            </div>

        </div>
    </div>

</div>

<div class="container-fluid" id="dokumentasi">

</div>

@endsection