<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';
    protected $fillable = ['name','slug'];

    public function roles()
{
    return $this->belongsToMany(role::class, 'permission_role', 'permission_id', 'role_id');
}
}
