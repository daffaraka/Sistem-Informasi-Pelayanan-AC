@extends('clients.client-layout')
@section('title', 'Beranda')
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
                @foreach ($layanan as $data)
                    <div class="col-lg-4 justify-content-center">
                        <a href="{{ route('pilihLayanan', $data->id_layanan) }}" class="text-decoration-none">

                            <img class="img-thumbnail shadow p-3 w-50" style="height: 200px;"
                                src="{{ asset('Gambar Layanan/' . $data->gambar_layanan) }}" alt="">
                            <h5 class="fw-bold my-3  link-dark">{{ $data->nama_layanan }}</h5>
                        </a>

                    </div>
                @endforeach


            </div>
        </div>


        

    </div>

    <div class="container-fluid py-5" id="ulasan">
        <div class="container mt-5" >

            <h1 class="informasi-judul text-center mb-5" id="layanan-kami">Apa Kata Mereka </h1>
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000">
                        <div class="d-block w-100 " style="height: 250px;" alt="..."></div>
                        <div class="carousel-caption d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <div class="d-block w-100 " style="height: 250px;" alt="..."></div>
                        <div class="carousel-caption d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block w-100 " style="height: 250px;" alt="..."></div>
                        <div class="carousel-caption d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>




    <div class="container-fluid" id="dokumentasi">

    </div>

@endsection
