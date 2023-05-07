<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $b = new Book;
        $b->isbn = '0241402425';
        $b->title = "The Dawn of Everything";
        $b->author = "David Graeber & David Wengrow";
        $b->release_date = Carbon::now();
        $b->save();

        Book::factory()->count(10)->create();
    }
}
