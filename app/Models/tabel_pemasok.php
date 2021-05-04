<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tabel_pemasok extends Model
{
    use HasFactory;

    protected $table = 'tabel_pemasoks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'date', 'name', 'alamat', 'kategori'
    ];

    public function allData()
    {
        return DB::table('tabel_pemasoks')->get();
    }

    public function detailData($id)
    {
        return DB::table('tabel_pemasoks')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tabel_pemasoks')->insert($data);
    }

    public function pembelian()
    {
        return $this->hasMany(tabel_pembelian::class);
    }

    public function stok()
    {
        return $this->hasMany(tabel_stok::class);
    }
}
