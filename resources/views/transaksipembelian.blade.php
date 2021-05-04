@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/pembelian.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endsection


@section('content')
    <fieldset class="layer_beranda">
        <div class="sb">Transaksi Pembelian</div>
        
        <div class="tabel2">
            <table id="dataTables" border="2">
                <thead>
                        <tr>
                            <th class="no1">No</th>
                            <th class="tanggalmasuk1">Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Pemasok</th>
                            <th>Jumlah</th>
                            <th>Pembayaran</th>
                            <th>Harga Beli (Rp)</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $key => $item)
                        <tr>
                            <th class="no1">{{ ++$key }}</th>
                            <th>{{ $item->date }}</th>
                            <th>{{ $item->nama }}</th>
                            @if ($item->pemasok == null)
                                <th>{{ $item->deleted_data->name }}</th>
                            @else
                                <th>{{ $item->pemasok->name }}</th>
                            @endif
                            <th>{{ $item->jumlah }}</th>
                            <th>{{ $item->payment }}</th>
                            <th>{{ $item->price }}</th> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script>
        $(document).ready(function() {
            $('#dataTables').DataTable();
        });
        </script>      
    </fieldset>
    <script>
        @if (session('status'))
            alertify.set('notifier', 'position', 'top-right');
            alertify.success("{{ Session::get('status') }}");               
        @endif
    </script>
@endsection