<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(){
//        Size::truncate();
        Size::create(["name" => "XS"]);
        Size::create(["name" => "S"]);
        Size::create(["name" => "M"]);
        Size::create(["name" => "L"]);
        Size::create(["name" => "XL"]);
        Size::create(["name" => "XXL"]);

    }
}
