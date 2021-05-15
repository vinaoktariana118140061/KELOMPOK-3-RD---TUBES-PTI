<div class="modal fade" id="TambahModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{ url('/pembelian/update').$item->id }}" method="POST">
                        @csrf
                        <label for="tanggal" class="label-tanggal" >Tanggal</label>
                        <input type="date" name="tanggal" class="tanggal" value="{{ old('tanggal') }}" required>
                        @error('tanggal')
                        <div class="e-tanggal">
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        </div>
                        @enderror
                        <br><br>
                        <label class="label-namabarang">Nama Barang</label>
                        <input type="text" readonly name="nama" class="namabarang" value="{{ $item->nama }}">
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
                            <option value disabled> pilih pemasok </option>
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
                        <input type="text" name="nota" id="user" class="nota" value="{{ old('nota') }}" required>
                        @error('nota')
                        <div class="e-nota">
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        </div>
                        @enderror
                        <br><br>
                        <label for="jumlah" id="label-jumlah" class="label-jumlah" >Jumlah Barang</label>
                        <input type="number" name="jumlah" id="user" class="jumlah" min="0" value="{{ 'jumlah' }}" required>
                        @error('jumlah')
                        <div class="e-jumlah">
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        </div>
                        @enderror
                        <label class="label-satuan1">Satuan</label>
                        <input type="text" readonly name="satuan" value="{{ $item->satuan }}" class="s111">
                        @error('satuan')
                        <div class="e-satuan1">
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        </div>
                        @enderror
                        <br><br>
                        <label id="label-bayar" class="label-bayar">Cara Bayar</label>
                        <input type="radio"  name="tipe" value="tunai" class="cb1" {{ old('tipe') == 'tunai' ? 'checked' : '' }} required>
                        <label for="tunai" class="tunai">Tunai</label>
                        <input type="radio" name="tipe" value="kredit" class="cb2" {{ old('tipe') == 'kredit' ? 'checked' : '' }} required>
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
                        <input type="text" name="harga" id="user" class="harga" value="{{ old('harga') }}" required>
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