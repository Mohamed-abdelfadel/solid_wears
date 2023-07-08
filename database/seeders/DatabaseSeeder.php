<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Cityseeder::class,
            CustomerSeeder::class,
            EmployeeSeeder::class,
            vendorSeeder::class,
            GenderSeeder::class,
            SizeSeeder::class,
            BrandSeeder::class,
            TypeSeeder::class,
            ColorSeeder::class,
            ProductSeeder::class,



        ]);
    }
}
