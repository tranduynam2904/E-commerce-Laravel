<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{
    use HasFactory, HasPermissions , HasRoles;
    protected $table = 'roles';
    protected $fillable = [
        'name',
        'guard_name',
    ];
    // public function user()
    // {
    //     return $this->hasMany(User::class, 'role_id');
    // }
    // public function permissions()
    // {
    //     return $this->hasMany(Permission::class);
    // }
}
