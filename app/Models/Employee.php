<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    public function job_category()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }
}
