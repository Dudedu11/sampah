<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiNasabah extends Model
{
    protected $table = 'detail_transaksi_nasabahs';

    protected $casts = [
        'transaksi_id' => 'int',
        'jenis_sampah_unit_id' => 'int'
    ];

    protected $fillable = [
        'transaksi_id',
        'jenis_sampah_unit_id',
        'jumlah',
        'total',
    ];

    public function transaksiNasabah()
    {
        return $this->belongsTo(TransaksiNasabah::class, 'transaksi_id');
    }

    public function jenisSampahUnit()
    {
        return $this->belongsTo(JenisSampahUnit::class, 'jenis_sampah_unit_id');
    }
}
