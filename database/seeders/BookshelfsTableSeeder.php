<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookshelfsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run() {
    \DB::table('bookshelfs')->insert([
        ['code' => 'A01', 'name' => 'Rak Sains'],
        ['code' => 'B02', 'name' => 'Rak Sejarah'],
    ]);
}
}
