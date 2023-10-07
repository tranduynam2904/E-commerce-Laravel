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
        'email',
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
}
