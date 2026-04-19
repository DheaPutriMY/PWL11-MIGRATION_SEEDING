<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
    $faker = \Faker\Factory::create('id_ID');
    for ($i = 1; $i <= 50; $i++) {
        \DB::table('users')->insert([
            'npm' => '55201' . $faker->numberBetween(21, 25) . str_pad($i, 3, '0', STR_PAD_LEFT),
            'username' => $faker->unique()->userName,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'email' => $faker->unique()->safeEmail,
            'password' => \Hash::make('password'),
            'created_at' => now(),
        ]);
    }
}
}
