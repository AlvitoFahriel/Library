<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class bookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Matahari Bersinar',
            'author' => 'Alvito',
            'page' => 100
        ]);

        Book::create([
            'title' => 'Matahari Terbenam',
            'author' => 'Alvita',
            'page' => 200
        ]);
    }
}
