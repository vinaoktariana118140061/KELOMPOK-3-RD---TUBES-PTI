<?php

namespace App\Http\Controllers;

use App\Models\tabel_pengeluaran;
use App\Models\tabel_stok;
use Illuminate\Http\Request;
use Validator;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'collection' => tabel_pengeluaran::with('stok')->get(),
            'stok' => tabel_stok::all()
        ];
        return view('transaksipengeluaran', $data);
    }
    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $stok = tabel_stok::where('id', $id)->first();

            $pengeluaran = [
                'tanggal' => $request->tanggal,
                'id_barang' => $stok->id,
                'kategori' => $request->kategori,
                'satuan' => $request->satuan,
                'jumlah' => $request->jumlah,
            ];

            $total = $request->jumlah;
            $stok->stok -= $total;
            $stok->save();

            tabel_pengeluaran::insert($pengeluaran);
            return redirect('/stok-barang')->with('successful', 'Barang berhasil dikurangi');
        }
    }
}
