<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\customer ;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::truncate();
        Customer::factory(100)->create();
//        Customer::create(["name" => "Hany", "phone" => "010123", "email" => "hany@gmail.com", "address" => "El-Dokki" ]);

    }
}
