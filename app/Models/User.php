<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * 
 * @property int $id
 * @property int $role_id
 * @property string|null $username
 * @property string|null $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Role $role
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $casts = [
        'role_id' => 'int'
    ];

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'role_id',
        'email',
        'password'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function induks()
    {
        return $this->hasMany(Induk::class, 'user_id');
    }

    public function units()
    {
        return $this->hasMany(Unit::class, 'user_id');
    }

    public function industris()
    {
        return $this->hasMany(Industri::class, 'user_id');
    }
}
