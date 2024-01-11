<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';

    protected $casts = [
        'user_id' => 'int',
        'induk_id' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'induk_id',
        'nama',
        'nama_ketua',
        'alamat',
        'no_telepon',
        'nama_bank',
        'no_rekening',
        'saldo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function induk()
    {
        return $this->belongsTo(Induk::class, 'induk_id');
    }


    public function nasabahs()
    {
        return $this->hasMany(Nasabah::class, 'unit_id');
    }

    public function transaksiNasabahs()
    {
        return $this->hasMany(TransaksiNasabah::class, 'unit_id');
    }

    public function tarikTunaiNasabahs()
    {
        return $this->hasMany(TransaksiNasabah::class, 'unit_id');
    }
}
