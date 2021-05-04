@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/manage_data.css')}}">
    <link rel="stylesheet" href="{{asset('css/tambah_pemasok.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="layer_beranda">
        <div class="layer_forms">
            <div class="f"> 
                <i class="fa fa-tasks">Manage</i>
            </div>
        </div>
        <div class="MP">Manage Data Pemasok</div>
        <div>
            @include('component.tambah')
            <button type="button" data-toggle="modal" data-target="#PemasokModal" class="b5">Tambah Pemasok </button>
            <button type="submit" onclick="window.location.href='{{ route('print-pdf') }}'" class="b6">Cetak Data Pemasok</button><br>
        </div>
        <div class="box_DP">
            <div class="DP"> Daftar Pemasok</div>
        </div>
        <div class="tabel1">
            <table id="dataTables"  border="2">
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th class="tanggalmasuk">Tanggal Masuk</th>
                        <th>Pemasok</th>
                        <th>Alamat</th>
                        <th class="status">Kategori Barang</th>
                        <th class="status">Status</th>
                        <th class="tanggalmasuk">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $key => $item)
                        <tr>
                            <td class="no">{{ ++$key }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                <input type="checkbox" data-id="{{ $item->id }}" class="toggle-class" data-onstyle="success"
                                    data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"
                                    {{ $item->status ? 'checked' : '' }}
                                >
                            </td>
                            <td>
                                <button data-toggle="modal" data-target="#editPemasokModal-{{ $item->id }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                @include('component.edit')
                                <form action="{{ url('/manage-data/delete').$item->id }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin ingin menghapusnya ?')">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable();
        });

        $(function(){
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var pemasok_id = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '/changeStatus',
                    data: {
                        'status': status,
                        'id': pemasok_id
                    },
                    success: function(data){
                        console.log(data.success)
                    }
                });
            });
        });
    </script>
    <script>
        @if (session('status'))
            alertify.set('notifier', 'position', 'top-right');
            alertify.success("{{ Session::get('status') }}");               
        @endif
    </script>
@endsection