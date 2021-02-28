<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
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
                'date' => $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 30 days', $timezone = 'Europe/Paris'),
                'slot' => $faker->time($format = 'H:i:s', $max = 'now'),
                'token' => md5(uniqid(true)),
            ]);
        }
    }
}
