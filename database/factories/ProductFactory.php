<?php

namespace Database\Factories;

<<<<<<< HEAD
use App\Models\Color;
use App\Models\ProductCategory;
use App\Models\Rating;
=======
use App\Models\ProductCategory;
>>>>>>> 9a4d2e1466d1bbbff54fc706ab064f547d02ec43
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
<<<<<<< HEAD
        $ratingIds = Rating::select('id')->get();
        $colorIds = Color::select('id')->get();
=======
>>>>>>> 9a4d2e1466d1bbbff54fc706ab064f547d02ec43
        return [
            "name" => $name,
            "slug" => $slug,
            "price" => fake()->randomFloat(2, 0, 999999),
            "discount_price" => fake()->randomFloat(2, 0, 999999),
            "short_description" => fake()->text(),
            "description" => fake()->text(),
            "qty" => fake()->randomDigitNotZero(),
<<<<<<< HEAD
=======
            "shipping" => fake()->text('10'),
>>>>>>> 9a4d2e1466d1bbbff54fc706ab064f547d02ec43
            "weight" => fake()->randomFloat(2, 0, 9),
            "status" => fake()->boolean(),
            "product_category_id" => fake()->randomElement($productCategoryIds),
            "image" => null,
<<<<<<< HEAD
            'rating_id' => fake()->randomElement($ratingIds),
            'color_id' => fake()->randomElement($colorIds),
=======
>>>>>>> 9a4d2e1466d1bbbff54fc706ab064f547d02ec43
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ];
    }
}
