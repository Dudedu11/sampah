<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampahUnit extends Model
{
    protected $table = 'jenis_sampah_units';

    protected $casts = [
        'unit_id' => 'int'
    ];

    protected $fillable = [
        'unit_id', 
        'nama',
        'satuan', 
        'harga_jual',
        'harga_beli', 
        'stok', 
        'deskripsi'
    ];
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
