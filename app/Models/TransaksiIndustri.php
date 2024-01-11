<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiIndustri extends Model
{
    protected $table = 'transaksi_industries';

    protected $casts = [
        'induk_id' => 'int',
        'industri_id' => 'int'
    ];

    protected $fillable = [
        'induk_id',
        'industri_id',
        'tanggal',
        'total',
    ];

    public function induk()
    {
        return $this->belongsTo(Induk::class, 'induk_id');
    }

    public function industri()
    {
        return $this->belongsTo(Industri::class, 'industri_id');
    }

    public function detailTransaksiIndustries()
    {
        return $this->hasMany(DetailTransaksiIndustri::class, 'transaksi_id');
    }
}
