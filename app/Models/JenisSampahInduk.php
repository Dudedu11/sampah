<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampahInduk extends Model
{
    protected $table = 'jenis_sampah_induks';

    protected $casts = [
        'kategori_id' => 'int'
    ];

    protected $fillable = [
        'kategori_id', 
        'nama',
        'satuan', 
        'harga_beli', 
        'harga_jual', 
        'stok', 
        'deskripsi'
    ];
    public function kategori()
    {
        return $this->belongsTo(KategoriSampah::class, 'kategori_id');
    }
}
