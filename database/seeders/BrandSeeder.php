<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Brand::truncate();
    Brand::create(["name" => "addidas"]);
    Brand::create(["name" => "Nike"]);
	Brand::create(["name" => "Louis Vuitton"]);
	Brand::create(["name" => "Hermes"]);
	Brand::create(["name" => "Gucci"]);
	Brand::create(["name" => "Zalando"]);
	Brand::create(["name" => "Adidas"]);
	Brand::create(["name" => "Zara"]);
	Brand::create(["name" => "H&M"]);
	Brand::create(["name" => "Cartier"]);
    Brand::create(["name" => "Other"]);

    }
}
