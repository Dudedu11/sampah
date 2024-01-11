<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiIndustri extends Model
{
    protected $table = 'detail_transaksi_industries';

    protected $casts = [
        'transaksi_id' => 'int',
        'sampah_treatment' => 'int'
    ];

    protected $fillable = [
        'transaksi_id',
        'sampah_treatment',
        'jumlah',
        'total',
    ];

    public function transaksiIndustri()
    {
        return $this->belongsTo(TransaksiIndustri::class, 'transaksi_id');
    }

    public function sampahTreatment()
    {
        return $this->belongsTo(SampahTreatment::class, 'sampah_treatment');
    }
}