<?php

namespace Database\Factories;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
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
        $employeeId = Employee::select('id')->get();
        return [
            'avatar' => '',
            'name' => $name,
            'slug' => $slug,
            'email' => fake()->email(),
            'age' => fake()->randomFloat(),
            'gender' => fake()->randomDigitNotNull(),
            'phone' => fake()->randomFloat(),
            'job_categories_id' => fake()->randomElement($employeeId),
            'description' => fake()->text(),
            'created_at' => Carbon::now(+7),
            'updated_at' => Carbon::now(+7)
        ];
    }
}
