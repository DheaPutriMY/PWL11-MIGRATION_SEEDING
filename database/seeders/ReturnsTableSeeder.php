<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReturnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run() {
    $details = \DB::table('loan_detail')->pluck('id');
    // Asumsi hanya setengah data yang dikembalikan
    foreach ($details->take(15) as $detailId) {
        \DB::table('returns')->insert([
            'loan_detail_id' => $detailId,
            'charge' => false,
            'amount' => 0,
        ]);
    }
}
}
