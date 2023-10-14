<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'avatar',
        'name',
        'slug',
        'email_id',
        'age',
        'gender',
        'phone',
        'job_category_id',
        'description',
    ];
    public function job_category()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }
    public function email()
    {
        return $this->belongsTo(Email::class, 'email_id');
    }
}
