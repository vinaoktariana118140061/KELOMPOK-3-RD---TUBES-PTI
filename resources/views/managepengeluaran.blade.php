<div class="modal fade" id="PengeluaranModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Form Manage Pengeluaran</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="inputan2">
                <div id="container_login" class="form-group center">
                    <fieldset>
                        <form action="{{ url('/pengeluaran/update').$item->id }}" method="POST">
                            @csrf
                            <label class="label-namakeluar" >Nama Barang</label>
                            <input type="text" readonly name="nama" class="namakeluar" value="{{ $item->nama }}">
                            <br><br>
                            <label class="label-kategori2">Kategori</label>
                            <input readonly type="text" name="kategori" value="{{ $item->pemasok->kategori }}" class="peralatan2">
                            <br><br>
                            <label class="label-satuan">Satuan</label>
                            <input readonly type="text" name="satuan" value="{{ $item->satuan }}" class="s1">
                            <br><br>
                            <label class="label-jumlahbarang">Jumlah Barang</label>
                            <input type="number" name="jumlah" class="jumlahbarang" max="{{ $item->stok }}" required>
                            @error('jumlah')
                            <div class="e-jumlah3">
                                <span class="text-danger jumlah_error">{{ $message }}</span>
                            </div>
                            @enderror
                            <br><br>
                            <label class="label-tanggalkeluar">Tanggal Keluar</label>
                            <input type="date" name="tanggal" class="tanggalkeluar" required>
                            @error('tanggal')
                            <div class="e-tanggal3">
                                <span class="text-danger tanggal_error">{{ $message }}</span>
                            </div>
                            @enderror
                            <br><br>
                            <button type="submit" class="simpan3">Simpan</button>
                        </form>
                    </fieldset>        
                </div>
            </div>
        </div>
    </div>
</div>