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
        <button data-toggle="modal" data-target="#TambahModal" class="mpe1">Tambah Transaksi</button>
        <div class="modal fade" id="TambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" class="modal-header2">
                        <h3 class="modal-title" id="exampleModalLabel">Form Tambah Transaksi</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="inputan4">
                        <div id="container_login" class="form-group center">
                            <form action="{{ route('pembelian-store') }}" method="POST">
                                @csrf
                                <label for="tanggal" class="label-tanggal" >Tanggal</label>
                                <input type="date" name="tanggal" class="tanggal">
                                @error('tanggal')
                                <div class="e-tanggal">
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                </div>
                                @enderror
                                <br><br>
                                <label class="label-namabarang">Nama Barang</label>
                                <input type="text" name="nama" class="namabarang">
                                @error('nama')
                                <div class="e-namabarang">
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                </div>
                                @enderror
                                <br><br>
                                <label class="label-pemasok" >Pemasok</label>
                                <select name="id_pemasok" class="pemasok">
                                    <option disabled value>Pilih Pemasok</option>
                                    @foreach ($pemasok as $item)
                                        @if ($item->status == 1)
                                            <option value="{{$item->id}}"> {{ $item->name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('id_pemasok')
                                <div class="e-pemasok">
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                </div>
                                @enderror
                                <br><br>
                                <label for="nota" id="label-nota" class="label-nota" >No Nota</label>
                                <input type="text" name="nota" id="user" class="nota">
                                @error('nota')
                                <div class="e-nota">
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                </div>
                                @enderror
                                <br><br>
                                <label for="jumlah" id="label-jumlah" class="label-jumlah" >Jumlah Barang</label>
                                <input type="number" name="jumlah" id="user" class="jumlah">
                                @error('jumlah')
                                <div class="e-jumlah">
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                </div>
                                @enderror
                                <label class="label-satuan1">Satuan</label>
                                <input type="radio" name="satuan" value="kg" class="s11">
                                <label for="kg" class="Kgg">Kg</label>
                                <input type="radio" name="satuan" value="pcs" class="s44">
                                <label for="pcs" class="pcss">Pcs</label>
                                @error('tipe')
                                <div class="e-satuan1">
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                </div>
                                @enderror
                                <br><br>
                                <label id="label-bayar" class="label-bayar">Cara Bayar</label>
                                <input type="radio"  name="tipe" value="tunai" class="cb1">
                                <label for="tunai" class="tunai">Tunai</label>
                                <input type="radio" name="tipe" value="kredit" class="cb2">
                                <label for="kredit" class="kredit">Kredit</label>
                                @error('tipe')
                                <div class="e-bayar">
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                </div>
                                @enderror
                                <br><br>
                                <label for="user" id="label-user" class="label-harga" >Harga Beli Rp</label>
                                <input type="text" name="harga" id="user" class="harga">
                                @error('harga')
                                <div class="e-harga">
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                </div>
                                @enderror
                                <br><br>
                                <button type="submit" id="simpan" value="simpan" class="simpan2">simpan</button>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    @error('nama')
        $("#TambahModal").modal('show');
    @enderror
    @error('satuan')
        $("#TambahModal").modal('show');
    @enderror
    @error('kategori')
        $("#TambahModal").modal('show');
    @enderror
    @error('jumlah')
        $("#TambahModal").modal('show');
    @enderror
    @error('tanggal')
        $("#TambahModal").modal('show');
    @enderror
    @error('tipe')
        $("#TambahModal").modal('show');
    @enderror
    @error('nota')
        $("#TambahModal").modal('show');
    @enderror
    @error('harga')
        $("#TambahModal").modal('show');
    @enderror
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