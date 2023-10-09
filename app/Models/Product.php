<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
<<<<<<< HEAD
        'second_image',
=======
>>>>>>> 9a4d2e1466d1bbbff54fc706ab064f547d02ec43
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
<<<<<<< HEAD

=======
>>>>>>> 9a4d2e1466d1bbbff54fc706ab064f547d02ec43
    public function rating()
    {
        return $this->hasMany(Rating::class, 'rating_id');
    }
    public function color()
    {
        return $this->hasMany(Color::class, 'color_id');
    }
}
