<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Gender;
use App\Models\Size;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            "price" => fake()->numberBetween(460 , 350),
            "cost" => fake()->numberBetween(350 , 250),
            "description" => fake()->address(),
            "stock"=> fake()->numberBetween(1 , 100),
            "gender_id" => rand(1 , Gender::count()),
            "size_id" => rand(1 , Size::count()),
            "brand_id" => rand(1 , Brand::count()),
            "type_id" => rand(1 , Type::count()),
            "color_id" => rand(1 , Color::count()),


        ];
    }
}
