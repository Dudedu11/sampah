<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleUser
 * 
 * @property int $id
 * @property int $role_id
 * @property string|null $nama_induk
 * @property string|null $nama_ketua_induk
 * @property string|null $alamat
 * @property string|null $no_telepon
 * @property string|null $nama_bank
 * @property string|null $no_rekening
 * @property float|null $saldo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Induk extends Model
{
    protected $table = 'induks';

    protected $casts = [
        'user_id' => 'int'
    ];

    protected $fillable = [
        'user_id',
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

    public function units()
    {
        return $this->hasMany(Unit::class, 'induk_id');
    }

    public function kategoriSampahs()
    {
        return $this->hasMany(KategoriSampah::class, 'induk_id');
    }
}
