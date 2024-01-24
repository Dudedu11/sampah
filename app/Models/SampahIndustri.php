<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampahIndustri extends Model
{
    protected $table = 'sampah_industris';

    protected $casts = [
        'industri_id'
    ];

    protected $fillable = [
        'industri_id',
        'nama',
        'satuan',  
        'jumlah', 
    ];

    public function industri()
    {
        return $this->belongsTo(Industri::class, 'industri_id');
    }
}
