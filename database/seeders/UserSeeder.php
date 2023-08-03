<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $user = User::create([
            'name' => 'User Pentacode',
            'email' => 'user@pentacode.id',
            'password' => Hash::make('pentacodex'),
        ]);
    }
}
