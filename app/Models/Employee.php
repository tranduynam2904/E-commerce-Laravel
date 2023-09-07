<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Employee extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'employee';
    protected $fillable = [
        // 'employee_id',
        // 'employee_name',
        // 'employee_email',
        // 'employee_password',
        // 'employee_role',
        // 'employee_status',
        'email',
        'password'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
