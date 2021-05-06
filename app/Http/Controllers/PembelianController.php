<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tabel_pembelian;
use App\Models\tabel_pemasok;
use App\Models\tabel_stok;
use App\Models\deleted_data;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'collection' => tabel_pembelian::with('pemasok', 'deleted_data')->get(),
            'pemasok' => tabel_pemasok::all(),
            'deleted_data' => deleted_data::all(),
        ];
        return view('transaksipembelian', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'nama' => 'required|unique:tabel_stoks',
            'id_pemasok' => 'required',
            'note' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'tipe' => 'required',
            'price' => 'required',
        ]);

        $pemasok = tabel_pemasok::findOrFail($request->id_pemasok);

        if (!is_numeric($request->note) || !is_numeric($request->price)) {
            return redirect('/stok-barang')->with('fail', 'Nota atau harga harus diisi dengan angka');
        }
        if ($request->satuan != 'pcs' && $pemasok->kategori == 'peralatan') {
            return redirect('/stok-barang')->with('fail', 'Satuan yang anda masukkan salah');
        }

        if (($request->satuan == 'pcs' && $pemasok->kategori == 'bahan') || ($request->satuan == 'pcs' && $pemasok->kategori == 'peralatan') ||
            ($request->satuan == 'kg' && $pemasok->kategori == 'bahan')
        ) {
            $stok_data = [
                'nama' => $request->nama,
                'id_pemasok' => $request->id_pemasok,
                'stok' => $request->jumlah,
                'satuan' => $request->satuan
            ];
            tabel_stok::insert($stok_data);

            $pembelian = [
                'nama' => $request->nama,
                'date' => $request->tanggal,
                'id_pemasok' => $request->id_pemasok,
                'nota' => $request->note,
                'jumlah' => $request->jumlah,
                'payment' => $request->tipe,
                'price' => $request->price,
            ];
            tabel_pembelian::insert($pembelian);
            return redirect('/stok-barang')->with('pesan', 'Data berhasil ditambah');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'nama' => 'required',
            'id_pemasok' => 'required',
            'nota' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'tipe' => 'required',
            'harga' => 'required',
        ]);
        if (!is_numeric($request->nota) || !is_numeric($request->harga)) {
            return redirect('/stok-barang')->with('fail', 'Nota atau harga harus diisi dengan angka');
        }

        $stok_barang = tabel_stok::where('id', $id)->first();

        $total = $stok_barang->stok + $request->jumlah;

        $pembelian = [
            'nama' => $request->nama,
            'date' => $request->tanggal,
            'id_pemasok' => $request->id_pemasok,
            'nota' => $request->nota,
            'jumlah' => $request->jumlah,
            'payment' => $request->tipe,
            'price' => $request->harga,
        ];

        tabel_stok::where('nama', '=', $request->nama)->update(['id_pemasok' => $request->id_pemasok, 'stok' => $total]);
        tabel_pembelian::insert($pembelian);
        return redirect('/stok-barang')->with('pesan', 'Stok barang berhasil ditambah');
    }
}
