@extends('dashboard.layout-dashboard')
@section('content')
    <a href="{{route('layanan.create')}}" class="btn btn-primary">Tambah Layanan</a>
    <table id="data-table-list" class="table table-striped table-bordered text-start shadow">
        <thead>
            <tr>
                <th class="px-2">#</th>
                <th class="px-2">Gambar Layanan</th>
                <th class="px-2">Nama Layanan</th>
                <th class="px-2">Deskripsi Layanan</th>
                <th class="px-2">Action</th>
            </tr>
        </thead>
        <tbody>


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
                    url: "{{ route('layanan') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'id_layanan',

                    },
                    {
                        data : 'gambar_layanan',
                        render: function(data, type, row, meta) {
                            return '<img src="{{ asset('Gambar Layanan') }}/' + data +
                                '" class="img-thumbnail border-0 " style="width:150px;" />';
                        },
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
