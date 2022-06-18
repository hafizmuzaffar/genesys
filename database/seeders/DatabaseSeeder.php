<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'admin',
            'level' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
            'remember_token' => Str::random(60),
        ]);
        User::create([
            'name' => 'user',
            'level' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456789'),
            'remember_token' => Str::random(60),
        ]);
    }
}
