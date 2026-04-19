<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
    \DB::table('categories')->insert([
        ['category' => 'Teknologi'],
        ['category' => 'Novel'],
    ]);
}
}
