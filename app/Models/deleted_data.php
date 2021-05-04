<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deleted_data extends Model
{
    use HasFactory;

    protected $table = 'deleted_datas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'date', 'name', 'alamat', 'kategori'
    ];

    public function pembelian()
    {
        return $this->hasMany(tabel_pembelian::class);
    }

    public function stok()
    {
        return $this->hasMany(tabel_stok::class);
    }
}
