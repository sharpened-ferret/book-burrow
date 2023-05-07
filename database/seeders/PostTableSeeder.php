<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p = new Post;
        $p->content = "This post is very useful";
        $p->post_date = Carbon::now();
        $p->author_id = 1;
        $p->book_id = 1;
        $p->save();

        Post::factory()->count(10)->create();
    }
}
