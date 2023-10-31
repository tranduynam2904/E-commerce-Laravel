<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'image',
        'second_image',
        'name',
        'status',
        'price',
        'slug',
        'discount_price',
        'weight',
        'product_category_id',
        'rating_id',
        'color_id',
        'short_description',
        'description',
    ];
    protected $table = 'products';
    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'rating_id');
    }
    public function colors()
    {
        return $this->hasMany(Color::class, 'color_id');
    }
}
