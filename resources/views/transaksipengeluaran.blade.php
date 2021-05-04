@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/pengeluaran.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('css/form-pengeluaran.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endsection

@section('content')
<fieldset class="layer_beranda">
    <div class="TPB">Transaksi Pengeluaran Barang</div>
    
    <div class="tabel3">
        <table id="example" border="2">
            <thead>
                <tr>
                    <th class="no2">No</th>
                    <th class="tanggalmasuk2">Tanggal</th>
                    <th>Nama barang</th>
                    <th>Kategori Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Satuan</th>
                </tr>
            </thead>
            <div style="max-height: 550px; overflow-y: scroll; !important">
            <tbody>
                @foreach ($collection as $key => $item)
                    <tr>
                        <th class="no2">{{ ++$key }}</th>
                        <th>{{ $item->tanggal }}</th>
                        <th>{{ $item->stok->nama }}</th>
                        <th>{{ $item->kategori }}</th>
                        <th>{{ $item->jumlah }}</th>
                        <th>{{ $item->satuan }}</th>
                    </tr>
                @endforeach
            </tbody>
            </div>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>      
</fieldset> 
</div>
@endsection