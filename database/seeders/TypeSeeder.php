<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Type::truncate();
    Type::create(["name" => "T-shirt"]);
    Type::create(["name" => "Shoes"]);
    Type::create(["name" => "Sweater"]);
    Type::create(["name" => "Dress"]);
    Type::create(["name" => "Hoodies"]);
    Type::create(["name" => "Trousers"]);
    Type::create(["name" => "Shorts"]);
    Type::create(["name" => "Skirt"]);
    Type::create(["name" => "Jeans"]);
    Type::create(["name" => "Shoes"]);
    Type::create(["name" => "Coat"]);
    Type::create(["name" => "Suit"]);
    Type::create(["name" => "Cap"]);
    Type::create(["name" => "Socks"]);
    Type::create(["name" => "Shirt"]);
    Type::create(["name" => "Scarf"]);
    Type::create(["name" => "Hat"]);
    Type::create(["name" => "Gloves"]);
    Type::create(["name" => "Jacket"]);
    Type::create(["name" => "Long coat"]);
    Type::create(["name" => "Boots"]);
    Type::create(["name" => "Sunglasses"]);
    Type::create(["name" => "Polo shirt"]);
    Type::create(["name" => "Leather jackets"]);
    }
}
