<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory; 

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++){
            DB::table('booking')->insert([
                'email' => $faker->safeEmail,
                'last_name' => $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 30 days', $timezone = 'Europe/Paris'),
                'email' => $faker->email,
                'message' => $faker->text,
            ]);
        }

    }
}
