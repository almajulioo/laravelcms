<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test User',
            'email' => 'test@cms.com',
            'password' => bcrypt("password")
        ]);

        Category::insert([
            [
                'name' => 'Comics',
                'slug' => 'Comics',
            ],
            [
                'name' => 'Films',
                'slug' => 'Films',
            ],
        ]);
    }
}
