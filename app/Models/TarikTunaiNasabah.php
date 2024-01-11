<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarikTunaiNasabah extends Model
{
    protected $table = 'tarik_tunai_nasabahs';

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
}
