<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run() {
    $this->call([
        UsersTableSeeder::class,
        BookshelfsTableSeeder::class,
        CategoriesTableSeeder::class,
        BooksTableSeeder::class,
        LoansTableSeeder::class,
        LoanDetailTableSeeder::class,
        ReturnsTableSeeder::class,
    ]);
}
}