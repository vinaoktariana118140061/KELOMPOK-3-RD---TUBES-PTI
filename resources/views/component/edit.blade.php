<link rel="stylesheet" href="{{asset('css/tambah_pemasok.css')}}">
<div class="modal fade" id="editPemasokModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Form Edit Data Pemasok</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="inputan">
                <div id="container_login" class="form-group center">
                    <form action="{{ url('/manage-data/edit').$item->id }}" method="POST">
                        @csrf
                        <label class="label-nama" for="user">Nama Perusahaan</label>
                        <input class="nama type="text" name="nama" id="user" class="form-control" value="{{ $item->name }}">
                        @error('nama')
                        <div class="e-nama2">
                            {{$message}}
                        </div>
                        @enderror
                        <label class="label-alamat" for="Alamat">Alamat</label>
			            <input class="alamat" type="alamat" name="alamat" id="Alamat" class="form-control" value="{{ $item->alamat }}">
                        @error('alamat')
                        <div class="e-alamat2">
                            {{$message}}
                        </div>
                        @enderror
                        <label class="label-kategori" for="kategori" id="label-Kategori">Kategori Barang</label>
                        <input class="r1" type="radio" id="peralatan" name="kategori" value="{{ $item->kategori }}">
                        <label  class="peralatan" for="peralatan">Peralatan</label>
                        <input class="r2" type="radio" id="bahan" name="kategori" value="{{ $item->kategori }}">
                        <label class="bahan" for="bahan">Bahan</label>
                        @error('kategori')
                            <br>
                            <div class="e-kategori2">
                                {{$message}}
                            </div>
                            <br>
                        @enderror
			            <button class="simpan" type="submit">simpan</button>        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    @error('nama')
        $("#editPemasokModal-{{ $item->id }}").modal('show');
    @enderror
    @error('alamat')
        $("#editPemasokModal-{{ $item->id }}").modal('show');
    @enderror
    @error('kategori')
        $("#editPemasokModal-{{ $item->id }}").modal('show');
    @enderror
</script>