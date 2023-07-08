<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'name' => fake()->name() ,
            "phone" => fake()->phoneNumber(),
            "email" => fake()->unique()->safeEmail(),
            "address" => fake()->address(),
            "city_id" => rand(1 , City::count())
        ];
    }
}
