<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Stock;
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

        $stock = Stock::create([
            'quantity' => 40,
            'product_id' => $product->id,
        ]);

        //

        $product = Product::create([
            'name' => 'Indomie Ayam Bawang',
            'status' => 'active',
            'harga' => 4000,
        ]);

        $stock = Stock::create([
            'quantity' => 20,
            'product_id' => $product->id,
        ]);

        //


        $product = Product::create([
            'name' => 'Indomie Soto',
            'status' => 'active',
            'harga' => 4000,
        ]);

        $stock = Stock::create([
            'quantity' => 20,
            'product_id' => $product->id,
        ]);

        //


        $product = Product::create([
            'name' => 'Batagor',
            'status' => 'active',
            'harga' => 3000,
        ]);

        $stock = Stock::create([
            'quantity' => 20,
            'product_id' => $product->id,
        ]);

        //


        $product = Product::create([
            'name' => 'Sukro',
            'status' => 'active',
            'harga' => 3000,
        ]);

        $stock = Stock::create([
            'quantity' => 20,
            'product_id' => $product->id,
        ]);

        //

    }
}
