<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonversiSampah extends Model
{
    protected $table = 'konversi_sampahs';

    protected $casts = [
        'induk_id',
        'sampah_id',
        'treatment_id'
    ];

    protected $fillable = [
        'sampah_id', 
        'induk_id',
        'treatment_id',
        'jumlah_sampah',
        'jumlah_treatment',
        'tanggal'
    ];

    public function induk()
    {
        return $this->belongsTo(Induk::class, 'induk_id');
    }

    public function jenisSampah()
    {
        return $this->belongsTo(JenisSampahInduk::class, 'sampah_id');
    }

    public function sampahTreatment()
    {
        return $this->belongsTo(SampahTreatment::class, 'treatment_id');
    }
}
