<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tabel_pemasok;
use Illuminate\Support\Facades\Date;
use Dompdf\Dompdf;
use App\Models\deleted_data;

class PemasokController extends Controller
{
    public function __construct()
    {
        $this->tabel_pemasok = new tabel_pemasok();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'collection' => $this->tabel_pemasok->allData()
        ];
        return view('managedata', $data);
    }

    public function downloadPDF()
    {
        $data = [
            'collection' => $this->tabel_pemasok->allData()
        ];

        $html = view('component.printpdf', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'potrait');

        $dompdf->render();

        $dompdf->stream();
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
            'nama' => 'required',
            'alamat' => 'required|min:10|max:30',
            'kategori' => 'required'
        ]);

        $data = [
            'date' => Date::now(),
            'name' => $request->nama,
            'alamat' => $request->alamat,
            'kategori' => $request->kategori
        ];

        $this->tabel_pemasok->addData($data);
        return redirect()->back()->with('status', 'Data berhasil ditambah');
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kategori' => 'required'
        ]);

        if ($request->isMethod('post')) {
            $data = $request->all();

            tabel_pemasok::where(['id' => $id])->update(['name' => $data['nama'], 'alamat' => $data['alamat'], 'kategori' => $data['kategori']]);

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemasok = tabel_pemasok::where('id', $id)->first();
        $data = [
            'id' => $pemasok->id,
            'date' => $pemasok->date,
            'name' => $pemasok->name,
            'alamat' => $pemasok->alamat,
            'kategori' => $pemasok->kategori,
        ];

        deleted_data::insert($data);

        tabel_pemasok::where('id', $id)->delete();

        return redirect()->back();
    }

    public function changeStatus(Request $request)
    {
        $pemasok = tabel_pemasok::find($request->id);
        $pemasok->status = $request->status;
        $pemasok->save();
    }
}
