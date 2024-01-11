<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarikTunaiUnit extends Model
{
    protected $table = 'tarik_tunai_units';

    protected $casts = [
        'unit_id' => 'int',
        'induk_id' => 'int'
    ];

    protected $fillable = [
        'unit_id',
        'induk_id',
        'tanggal',
        'total',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function induk()
    {
        return $this->belongsTo(Induk::class, 'induk_id');
    }
}
