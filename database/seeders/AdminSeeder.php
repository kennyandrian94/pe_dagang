<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $admin = Admin::create([
            'name' => 'Admin Pentacode',
            'email' => 'admin@pentacode.id',
            'password' => Hash::make('pentacodex'),
        ]);
    }
}
