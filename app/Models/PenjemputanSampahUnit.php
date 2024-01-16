<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjemputanSampahUnit extends Model
{
    protected $table = 'penjemputan_sampah_units';

    protected $casts = [
        'unit_id' => 'int',
        'induk_id' => 'int'
    ];

    protected $fillable = [
        'unit_id',
        'induk_id',
        'tanggal',
        'total',
        'status'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function induk()
    {
        return $this->belongsTo(Induk::class, 'induk_id');
    }

    public function detailPenjemputanSampahUnits()
    {
        return $this->hasMany(DetailPenjemputanSampahUnit::class, 'penjemputan_id');
    }

    public static function getTotalTransakasiUnit($year, $month, $unit_id)
    {
        return self::where('unit_id', $unit_id)
            ->whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month)
            ->count();
    }
}
