<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenguranganSampahUnit extends Model
{
    protected $table = 'pengurangan_sampah_units';

    protected $casts = [
        'unit_id' => 'int',
    ];

    protected $fillable = [
        'unit_id',
        'keterangan',
        'tanggal',
        'total',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function detailTransaksiNasabahs()
    {
        return $this->hasMany(DetailTransaksiNasabah::class, 'transaksi_id');
    }
}
