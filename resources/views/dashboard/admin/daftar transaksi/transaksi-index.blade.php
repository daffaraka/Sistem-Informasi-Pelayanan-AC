@extends('dashboard.layout-dashboard')
@section('content')
    <table id="data-table-list" class="table table-striped table-bordered text-start shadow">
        <thead>
            <tr>
                <th class="px-2">#</th>
                <th class="px-2">Layanan</th>
                <th class="px-2">Penerima Layanan</th>
                <th class="px-2">Alamat</th>
                <th class="px-2">Jml Ac</th>
                <th class="px-2">Status</th>
                <th class="px-2">Teknisi</th>
                <th class="px-2">Bukti Pembayaran</th>
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
                    url: "{{ route('admin.daftarTransaksi') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'id_transaksi',

                    },
                    {
                        data :'layanan.nama_layanan',
                    },
                    {
                        data: 'penerima_layanan',
                    },
                    {
                        data: 'alamat',
                    },
                    {
                        data: 'jumlah_ac',
                    },
                    {
                        data: 'status',
                    },
                    {
                        data: 'teknisi.nama_teknisi',
                        defaultContent : 'Transaksi belum selesai'
                    },
                    {
                        data: 'bukti_pembayaran',
                        defaultContent: 'Belum ada'
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
