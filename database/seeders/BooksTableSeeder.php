<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
    $faker = \Faker\Factory::create();
    for ($i = 0; $i < 20; $i++) {
        \DB::table('books')->insert([
            'title' => $faker->sentence(3),
            'author' => $faker->name,
            'year' => $faker->year,
            'publisher' => $faker->company,
            'city' => $faker->city,
            'cover' => 'cover.jpg',
            'bookshelf_id' => \DB::table('bookshelfs')->inRandomOrder()->first()->id,
            'category_id' => \DB::table('categories')->inRandomOrder()->first()->id,
        ]);
    }
}
}
