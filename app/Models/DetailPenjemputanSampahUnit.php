<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjemputanSampahUnit extends Model
{
    protected $table = 'detail_penjemputan_sampah_units';

    protected $casts = [
        'penjemputan_id' => 'int',
        'jenis_sampah_unit_id' => 'int'
    ];

    protected $fillable = [
        'penjemputan_id',
        'jenis_sampah_unit_id',
        'jumlah',
        'total',
    ];

    public function penjemputanSapahUnit()
    {
        return $this->belongsTo(PenjemputanSampahUnit::class, 'penjemputan_id');
    }

    public function jenisSampahUnit()
    {
        return $this->belongsTo(JenisSampahUnit::class, 'jenis_sampah_unit_id');
    }
}
