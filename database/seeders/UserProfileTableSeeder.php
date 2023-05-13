<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserProfile;

class UserProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $up = new UserProfile;
        $up->has_image = false;
        $up->bio = "How Are You Holding Up? Because I'm A Potato.";
        $up->user_id = 1;
        $up->save();

        $up = new UserProfile;
        $up->has_image = false;
        $up->bio = "Unlimited Power.";
        $up->user_id = 2;
        $up->save();

        UserProfile::factory()->count(10)->create();
    }
}
