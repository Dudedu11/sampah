<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampahInduk extends Model
{
    protected $table = 'jenis_sampah_induks';

    protected $casts = [
        'kategori_id' => 'int',
        'induk_id'
    ];

    protected $fillable = [
        'kategori_id', 
        'induk_id',
        'nama',
        'satuan', 
        'harga', 
        'stok', 
        'deskripsi'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSampah::class, 'kategori_id');
    }

    public function induk()
    {
        return $this->belongsTo(Induk::class, 'induk_id');
    }
}
