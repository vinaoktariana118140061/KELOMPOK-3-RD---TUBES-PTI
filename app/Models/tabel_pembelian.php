<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tabel_pembelian extends Model
{
    use HasFactory;

    protected $table = 'tabel_pembelians';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nama', 'date', 'id_pemasok', 'nota', 'jumlah', 'payment', 'price'
    ];

    public function pemasok()
    {
        return $this->BelongsTo(tabel_pemasok::class, 'id_pemasok');
    }

    public function stok()
    {
        return $this->belongsTo(tabel_stok::class, 'id_pemasok');
    }

    public function deleted_data()
    {
        return $this->BelongsTo(deleted_data::class, 'id_pemasok');
    }
}
