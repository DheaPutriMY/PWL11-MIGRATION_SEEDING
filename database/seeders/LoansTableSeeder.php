<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
    $users = \DB::table('users')->pluck('npm');
    for ($i = 0; $i < 30; $i++) {
        \DB::table('loans')->insert([
            'user_npm' => $users->random(),
            'loan_at' => now(),
            'return_at' => now()->addDays(7),
        ]);
    }
}
}
