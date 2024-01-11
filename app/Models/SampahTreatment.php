<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampahTreatment extends Model
{
    protected $table = 'sampah_treatments';

    protected $casts = [
        'induk_id'
    ];

    protected $fillable = [
        'induk_id',
        'nama',
        'satuan', 
        'harga', 
        'stok', 
        'deskripsi'
    ];

    public function induk()
    {
        return $this->belongsTo(Induk::class, 'induk_id');
    }
}
