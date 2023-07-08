<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;
class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create(["name" => "Red" , "hex"=>"#FF0000"]);
        Color::create(["name" => "bink" , "hex"=>"#ff80ed"]);
        Color::create(["name" => "green" , "hex"=>"#065535"]);
        Color::create(["name" => "Black" , "hex"=>"#000000"]);
        Color::create(["name" => "Teal" , "hex"=>"#133337"]);
        Color::create(["name" => "Rose" , "hex"=>"#ffc0cb"]);
        Color::create(["name" => "White" , "hex"=>"#ffffff"]);
        Color::create(["name" => "Light rose" , "hex"=>"#ffe4e1"]);
        Color::create(["name" => "Turkuaz" , "hex"=>"#008080"]);
        Color::create(["name" => "Red" , "hex"=>"#ff0000"]);
        Color::create(["name" => "Lavender" , "hex"=>"#e6e6fa"]);
        Color::create(["name" => "Yellow" , "hex"=>"#ffd700"]);
        Color::create(["name" => "Orange" , "hex"=>"#ffa500"]);
        Color::create(["name" => "Cyan" , "hex"=>"#00ffff"]);
        Color::create(["name" => "Blue" , "hex"=>"#0000ff"]);
        Color::create(["name" => "Prussian Blue" , "hex"=>"#003366"]);
        Color::create(["name" => "Brown" , "hex"=>"#800000"]);
        Color::create(["name" => "Purple" , "hex"=>"#800080"]);
        Color::create(["name" => "Gray" , "hex"=>"#333333"]);
        Color::create(["name" => "Light Blue" , "hex"=>"#3399FF"]);



    }
}
