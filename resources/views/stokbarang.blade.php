@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/stok.css') }}">
    <link rel="stylesheet" href="{{asset('css/managepengeluaran.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/tambahtransaksi.css') }}">
@endsection

@section('content')
<fieldset class="layer_beranda">
    <div class="sb">Stok Barang</div>
    <div>
        @include('ModalPembelian')
        <button data-toggle="modal" data-target="#TambahTransaksi" class="mpe1">Tambah Transaksi</button>
    </div>
    <div class="tabel1">
        <table id="example" border="2">
            <thead>
                <tr>
                    <th class="no3" >No</th>
                    <th class="nama-b">Nama Barang</th>
                    <th class="kategori">Kategori Barang</th>
                    <th class="pemasok1">Pemasok</th>
                    <th class="aksi3">Stok</th>
                    <th class="aksi3">Satuan</th>
                    <th class="aksi4">Aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($collection as $key => $item)
                    <tr>
                        <th class="no3">{{ ++$key }}</th>
                        <th>{{ $item->nama }}</th>
                        @if ($item->pemasok == null)
                            <th>{{ $item->deleted_data->kategori }}</th>
                            <th>{{ $item->deleted_data->name }}</th>
                        @else
                            <th>{{ $item->pemasok->kategori }}</th>
                            <th>{{ $item->pemasok->name }}</th>
                        @endif
                        <th>{{ $item->stok }}</th>
                        <th>{{ $item->satuan }}</th>
                        <th>
                            <button data-toggle="modal" data-target="#TambahModal-{{ $item->id }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i>
                            </button>
                            <button data-toggle="modal" data-target="#PengeluaranModal-{{ $item->id }}" class="btn btn-sm btn-warning">
                                <i class="fa fa-minus"></i>
                            </button>
                            @include('tambahtransaksi')
                            @include('managepengeluaran')
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>   
    </div> 
</fieldset>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    @if (session('successful'))
        alertify.set('notifier', 'position', 'top-right');
        alertify.success("{{ Session::get('successful') }}");               
    @endif
</script>
<script>
    @if (session('pesan'))
        alertify.set('notifier', 'position', 'top-right');
        alertify.success("{{ Session::get('pesan') }}");               
    @endif
    @if (session('fail'))
        alertify.set('notifier', 'position', 'top-right');
        alertify.error("{{ Session::get('fail') }}");
        $("#TambahModal").modal('show');              
    @endif
</script>
@endsection