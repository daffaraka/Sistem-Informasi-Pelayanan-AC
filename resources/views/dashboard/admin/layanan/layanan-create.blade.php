@extends('dashboard.layout-dashboard')
<title>Buat Layanan Baru</title>
@section('content')
    <div class="container p-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class="text-center text-dark">Tambah Layanan</h2>
                </div>
                <div class="pull-right px-1">
                    <a class="btn btn-primary" href="{{ route('layanan') }}"> Back</a>
                </div>
            </div>
        </div>


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('layanan.store') }}" class="p-3 rounded" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row bg-light p-3">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Layanan:</strong>
                        <input type="file" name="gambar_layanan" class="form-control" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Layanan:</strong>
                        <input type="text" name="nama_layanan" class="form-control" placeholder="Nama Layanan" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Deskripsi Layanan:</strong>
                        <input type="text" name="deskripsi_layanan" class="form-control" placeholder="Deskripsi Layanan">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Biaya Layanan:</strong>
                        <input type="number" name="biaya_layanan" class="form-control" placeholder="Biaya Layanan">
                    </div>
                </div>
               
              
                <div class="col-xs-12 col-sm-12 col-md-12 text-center ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        {{-- {!! Form::open(['route' => 'user.store', 'method' => 'POST']) !!}

    {!! Form::close() !!} --}}


    </div>

@endsection
