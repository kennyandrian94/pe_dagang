<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // $customer = Admin::create([
        //     'name' => 'Admin Pentacode',
        //     'email' => 'admin@pentacode.id',
        //     'password' => Hash::make('pentacodex'),
        // ]);

        $customers = [
            'Ryan Ridhwan Arief' => 'Ryan',
            'Muhammad Hilman Fauzie' => 'Uji',
            'Harwiadi Purwanto' => 'Adi',
            'Gerry Herdianto' => 'Gerry',
            'Hisman Nata Saputra' => 'Hisman',
            'Kenny Andrian Waluyo' => 'Kenny',
            'Adriana Eka Prayudha' => 'Adri',
            'Winda Kristihansari' => 'Winda',
            'Alvin Aditya' => 'Alvin',
            'Sheila Melinda' => 'Sheila',
            'Siddiq Mustofa' => 'Siddiq',
            'Muhammad Faisal Al Fauzi' => 'Faisal',
            'Yazid Fadlullah At-Taukily' => 'Yazid',
            'Ellfahmie' => 'Fahmi',
            'Ardhi Aprianto' => 'Ardhi',
            'Nico Ari Novriantoro' => 'Nico',
            'Ade Isman Aji' => 'Isman',
            'Bain' => 'Bain',
            'Louis Cahya Yanuar' => 'Louis',
            'En Mia Simaibang' => 'Enmia',
            'Ajeng Tiawantika' => 'Ajeng',
            'Pramudyo Wicaksono' => 'Oki',
            'Deni Kustiawan' => 'Deni',
            'Fiddy Fauzan' => 'Fiddy',
            'Nurul Aulia Hapsari' => 'Nurul',
            'Afrizal Kurnianto' => 'Bonte',
            'Miftahul Fikri' => 'Dude',
            'Reza Teguh Faisal' => 'Eja',
            'Gagi Aria Alembana Fatkhurahman' => 'Gagi',
            'Rangga Hadiwira' => 'Mekol',
            'Ferdiansyah' => 'Ferdi',
            'Muhammad Sudrajat Anugrah' => 'Graha',
            // 'Rangga Yulianarko' => 'Rangga',
            'Donny Pandega' => 'Donny',
            'Amanda Paramitha Suharnoko' => 'Manda',
            'Agnes Hendyana Putrica Dewi' => 'Agnes',
            'Habil Ikraam Sidik' => 'Habil',
            'Tubagus Akmal Pratama' => 'Akmal',
            'Kusnandar' => 'Koes',
            'Panji Permana Syahid' => 'Panji',
            'Arum Indah Nirwana' => 'Rumi',
            'Hermawan' => 'Awan',
            'Ilham Faisyal Rizky' => 'Ilham',
            'Achmad Rizky Nur Pratama' => 'Kiky',
            'Muhammad Taufiq Mahdi' => 'Taufiq',
            'Zenda Eka Brilian' => 'Zenda',
            'Farida Tunnida' => 'Datun',
            'Fathur Lambang Hartiadi' => 'Fathur',
            'Firman Zakaria' => 'Arya',
            'Lyssa Ratna Meilyssa' => 'Lyssa',
            'Taufiq Hidayat' => 'Toto',
            'Fibula Nadya' => 'Bula',
            'Fathir Pratama' => 'Tama'
        ];

        foreach ($customers as $key => $d) {
            $customer = new Customer;
            $customer->nickname = $d;
            $customer->name = $key;
            $customer->save();
        }
    }
}
