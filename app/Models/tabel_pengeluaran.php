<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabel_pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'tabel_pengeluarans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'tanggal', 'id_barang', 'satuan', 'jumlah'
    ];

    public function stok()
    {
        return $this->belongsTo(tabel_stok::class, 'id_barang');
    }
}
