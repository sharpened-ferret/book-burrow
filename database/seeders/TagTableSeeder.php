<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $t1 = new Tag;
        $t1->label = "SciFi";
        $t1->save();

        $t2 = new Tag;
        $t2->label = "Fantasy";
        $t2->save();

        $t3 = new Tag;
        $t3->label = "Crime";
        $t3->save();

        $t4 = new Tag;
        $t4->label = "LGBT";
        $t4->save();

        $t5 = new Tag;
        $t5->label = "Nonfiction";
        $t5->save();
    }
}
