<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $table = 'nasabahs';

    protected $casts = [
        'unit_id' => 'int'
    ];

    protected $fillable = [
        'unit_id',
        'nik',
        'nama',
        'alamat',
        'no_telepon',
        'no_rekening',
        'saldo',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function transaksiNasabahs()
    {
        return $this->hasMany(TransaksiNasabah::class, 'nasabah_id');
    }

    public function tarikTunaiNasabahs()
    {
        return $this->hasMany(TransaksiNasabah::class, 'nasabah_id');
    }
}
