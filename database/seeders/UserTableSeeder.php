<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $t = new User;
        $t->name = "Test";
        $t->email = "test@test.com";
        $t->password = bcrypt("password");
        $t->save();

        $a = new User;
        $a->name = "admin";
        $a->email = "admin@test.com";
        $a->password = bcrypt("admin");
        $a->is_admin = true;
        $a->save();
    }
}
