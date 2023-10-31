<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeProductCategory extends Model
{
    use HasFactory;
    protected $table = 'home_product_categories';
    protected $fillable = [
        'name',
        
    ];
}
