<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
    $loans = \DB::table('loans')->pluck('id');
    $books = \DB::table('books')->pluck('id');
    foreach ($loans as $loanId) {
        \DB::table('loan_detail')->insert([
            'loan_id' => $loanId,
            'book_id' => $books->random(),
            'is_return' => false,
        ]);
    }
}
}
