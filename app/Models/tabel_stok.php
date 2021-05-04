<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tabel_stok extends Model
{
    use HasFactory;

    protected $table = 'tabel_stoks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nama', 'id_pemasok', 'stok', 'satuan'
    ];

    public function allData()
    {
        return DB::table('tabel_stoks')->get();
    }

    public function barang()
    {
        return $this->hasOne(tabel_pembelian::class);
    }

    public function pemasok()
    {
        return $this->belongsTo(tabel_pemasok::class, 'id_pemasok');
    }

    public function pembelian()
    {
        return $this->hasOne(tabel_pembelian::class);
    }

    public function pengeluaran()
    {
        return $this->hasOne(tabel_pengeluaran::class);
    }

    public function deleted_data()
    {
        return $this->BelongsTo(deleted_data::class, 'id_pemasok');
    }
}
