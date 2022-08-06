@extends('dashboard.layout-dashboard')
@section('content')
    <a href="" class="btn btn-primary">Tambah Layanan</a>
    <table id="data-table-list" class="table table-striped table-bordered text-start shadow">
        <thead>
            <tr>
                <th class="px-2">#</th>
                <th class="px-2">Nama Layanan</th>
                <th class="px-2">Deskripsi Layanan</th>
                <th class="px-2">Action</th>
            </tr>
        </thead>
        <tbody>

            {{-- @foreach ($artist as $a)
            <tr>
                <td>{{$a->id_artist}}</td>
                <td>{{$a->artist_name}}</td>
                <td>{{$a->artist_dom}}</td>
                <td>
                    <a href="{{route('artist.edit',$a->id_artist)}}" class="btn btn-dark">Edit</a>
                    <a href="{{route('artist.destroy',$a->id_artist)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
       @endforeach --}}

        </tbody>
    </table>
@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $(document).ready(function() {
            var i = 1;
            $('#data-table-list').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('daftar_layanan') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'id_layanan',

                    },
                    {
                        data: 'nama_layanan',
                    },
                    {
                        data: 'deskripsi_layanan',
                    },
                    {
                        data: 'action',
                    },
                ],
                order: [
                    [0, 'asc']
                ]
            });
        });
    </script>
@endpush
