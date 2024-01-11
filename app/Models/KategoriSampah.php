<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSampah extends Model
{
    protected $table = 'kategori_sampahs';

    protected $casts = [
        'induk_id' => 'int'
    ];

    protected $fillable = ['induk_id', 'nama'];

    public function induk()
    {
        return $this->belongsTo(Induk::class, 'induk_id');
    }

    public function jenisSampahInduks()
    {
        return $this->hasMany(JenisSampahInduk::class, 'kategori_id');
    }
}
