<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Permission extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'permissions';
    protected $fillable = [
        'name',
        'guard_name',
    ];
    // public function role(){
    //     return $this->belongsTo(Role::class);
    // }
}
