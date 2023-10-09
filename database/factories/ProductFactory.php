<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\ProductCategory;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $slug = Str::slug($name);

        //Query Builder
        // $productCategory = DB::table('product_categories')->get();
        //Laravel Eloquent
        $productCategoryIds = ProductCategory::select('id')->get();
        $ratingIds = Rating::select('id')->get();
        $colorIds = Color::select('id')->get();
        return [
            "name" => $name,
            "slug" => $slug,
            "price" => fake()->randomFloat(2, 0, 999999),
            "discount_price" => fake()->randomFloat(2, 0, 999999),
            "short_description" => fake()->text(),
            "description" => fake()->text(),
            "qty" => fake()->randomDigitNotZero(),
            "weight" => fake()->randomFloat(2, 0, 9),
            "status" => fake()->boolean(),
            "product_category_id" => fake()->randomElement($productCategoryIds),
            "image" => null,
            'rating_id' => fake()->randomElement($ratingIds),
            'color_id' => fake()->randomElement($colorIds),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ];
    }
}
