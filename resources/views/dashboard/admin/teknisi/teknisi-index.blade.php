@extends('dashboard.layout-dashboard')
@section('content')
    <a href="{{ route('teknisi.create') }}" class="btn btn-primary">Tambah Teknisi</a>
    <table id="data-table-list" class="table table-striped table-bordered text-start shadow">
        <thead>
            <tr>
                <th class="px-2">#</th>
                <th class="px-2">Nama Teknisi</th>
                <th class="px-2">Contact Teknisi</th>
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
                    url: "{{ route('teknisi') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'id_teknisi',

                    },
                    {
                        data: 'nama_teknisi',
                    },
                    {
                        data: 'no_hp',
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
