<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = fake();
        $now = now();

        // 1. Categories
        $categories = [
            'Teknologi',
            'Pemrograman',
            'Sains',
            'Novel',
            'Sejarah',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'category' => $category,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // 2. Bookshelfs
        $bookshelfs = [
            ['code' => 'A01', 'name' => 'Rak A'],
            ['code' => 'B01', 'name' => 'Rak B'],
            ['code' => 'C01', 'name' => 'Rak C'],
            ['code' => 'D01', 'name' => 'Rak D'],
            ['code' => 'E01', 'name' => 'Rak E'],
        ];

        foreach ($bookshelfs as $bookshelf) {
            DB::table('bookshelfs')->insert([
                'code' => $bookshelf['code'],
                'name' => $bookshelf['name'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // 3. Users
        for ($i = 1; $i <= 10; $i++) {
            $angkatan = $faker->numberBetween(21, 25);
            $urutan = str_pad((string) $i, 3, '0', STR_PAD_LEFT);

            $npm = '55201' . $angkatan . $urutan;

            DB::table('users')->insert([
                'npm' => $npm,
                'username' => 'user' . $i,
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'email' => 'user' . $i . '@gmail.com',
                'email_verified_at' => $now,
                'password' => Hash::make('password123'),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $categoryIds = DB::table('categories')->pluck('id')->all();
        $bookshelfIds = DB::table('bookshelfs')->pluck('id')->all();
        $userNpms = DB::table('users')->pluck('npm')->all();

        // 4. Books (50 data)
        for ($i = 1; $i <= 50; $i++) {
            DB::table('books')->insert([
                'title' => 'Buku ' . $faker->words(3, true),
                'author' => $faker->name(),
                'year' => $faker->numberBetween(2000, 2025),
                'publisher' => $faker->company(),
                'city' => $faker->city(),
                'cover' => 'cover-' . $i . '.jpg',
                'category_id' => $faker->randomElement($categoryIds),
                'bookshelf_id' => $faker->randomElement($bookshelfIds),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $bookIds = DB::table('books')->pluck('id')->all();

        // 5. Loans
        for ($i = 1; $i <= 10; $i++) {
            $loanAt = $faker->dateTimeBetween('-2 months', 'now');
            $returnAt = (clone $loanAt)->modify('+' . rand(3, 14) . ' days');

            $loanId = DB::table('loans')->insertGetId([
                'user_npm' => $faker->randomElement($userNpms),
                'loan_at' => $loanAt->format('Y-m-d'),
                'return_at' => $returnAt->format('Y-m-d'),
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            // 6. Loan detail
            $detailCount = rand(1, 3);

            for ($j = 1; $j <= $detailCount; $j++) {
                $loanDetailId = DB::table('loan_detail')->insertGetId([
                    'loan_id' => $loanId,
                    'book_id' => $faker->randomElement($bookIds),
                    'is_return' => $faker->boolean(70),
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);

                // 7. Returns
                if ($faker->boolean(40)) {
                    DB::table('returns')->insert([
                        'loan_detail_id' => $loanDetailId,
                        'charge' => $faker->boolean(50),
                        'amount' => $faker->numberBetween(1000, 50000),
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]);
                }
            }
        }
    }
}