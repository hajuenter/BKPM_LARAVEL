<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = \Faker\Factory::create('id_ID'); 

        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('detail_profile')->insert([
        //         'addres'     => $faker->address,
        //         'nomor_tlp'  => $faker->phoneNumber,
        //         'ttl'        => $faker->date('Y-m-d'),
        //         'foto'       => $faker->imageUrl(200, 200, 'people', true, 'profile'),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
        DB::table('detail_profile')->insert([
            'addres' => 'Nganjuk',
            'nomor_tlp'  => '089xxxxxxx',
            'ttl'        => '2000-11-26',
            'foto'       => 'picture.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
