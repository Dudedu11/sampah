<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleUser
 * 
 * @property int $id
 * @property string|null $nama
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
    protected $table = 'roles';

	protected $fillable = [
		'nama'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'role_id');
	}
}
