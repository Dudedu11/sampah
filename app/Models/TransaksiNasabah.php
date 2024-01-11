<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiNasabah extends Model
{
    protected $table = 'transaksi_nasabahs';

    protected $casts = [
        'unit_id' => 'int',
        'nasabah_id' => 'int'
    ];

    protected $fillable = [
        'unit_id',
        'nasabah_id',
        'tanggal',
        'total',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'nasabah_id');
    }

    public function detailTransaksiNasabahs()
    {
        return $this->hasMany(DetailTransaksiNasabah::class, 'transaksi_id');
    }
}
