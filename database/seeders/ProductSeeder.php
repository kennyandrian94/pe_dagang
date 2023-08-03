<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $product = Product::create([
            'name' => 'Indomie Goreng',
            'status' => 'active',
            'harga' => 4000,
        ]);

        $product = Product::create([
            'name' => 'Indomie Ayam Bawang',
            'status' => 'active',
            'harga' => 4000,
        ]);

        $product = Product::create([
            'name' => 'Indomie Soto',
            'status' => 'active',
            'harga' => 4000,
        ]);

        $product = Product::create([
            'name' => 'Batagor',
            'status' => 'active',
            'harga' => 3000,
        ]);

        $product = Product::create([
            'name' => 'Sukro',
            'status' => 'active',
            'harga' => 3000,
        ]);
    }
}
