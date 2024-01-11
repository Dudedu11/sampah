<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestPendampingan extends Model
{
    protected $table = 'request_pendampingans';

    protected $fillable = [
        'tanggal',
        'jenis',
        'nama',
        'alamat',
        'keterangan',
        'status',
    ];
}
