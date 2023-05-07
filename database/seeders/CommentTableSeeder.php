<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c = new Comment;
        $c->content = "No it's not.";
        $c->post_date = Carbon::now();
        $c->user_id = 1;
        $c->post_id = 1;
        $c->save();

        Comment::factory()->count(10)->create();
    }
}
