<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenguranganSampahUnit extends Model
{
    protected $table = 'detail_pengurangan_units';

    protected $casts = [
        'pengurangan_id' => 'int',
        'jenis_sampah_unit_id' => 'int'
    ];

    protected $fillable = [
        'pengurangan_id',
        'jenis_sampah_unit_id',
        'jumlah',
        'total',
    ];

    public function penguranganSampahUnit()
    {
        return $this->belongsTo(PenguranganSampahUnit::class, 'pengurangan_id');
    }

    public function jenisSampahUnit()
    {
        return $this->belongsTo(JenisSampahUnit::class, 'jenis_sampah_unit_id');
    }
}
