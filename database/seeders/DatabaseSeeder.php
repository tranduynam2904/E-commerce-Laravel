<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Employee::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // \App\Models\ProductCategory::factory(3)->create();
        $productCategories = [
            [
                'name' => 'featured',
                'status' => '1'
            ],
            [
                'name' => 'latest',
                'status' => '1'
            ],
            [
                'name' => 'bestseller',
                'status' => '1'
            ]
        ];
        foreach ($productCategories as $productCategory) {
            ProductCategory::create($productCategory);
        }
        \App\Models\Rating::factory(10)->create();
        \App\Models\Color::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
