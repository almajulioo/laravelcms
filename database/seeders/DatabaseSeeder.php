<?php

namespace Database\Seeders;

use App\Models\Role;
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
        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@cms.com',
                'password' => bcrypt("password"),
                'role_id' => 1
            ],
            [
                'name' => 'editor',
                'email' => 'editor@cms.com',
                'password' => bcrypt("password"),
                'role_id' => 2
            ],
            [
                'name' => 'visitor',
                'email' => 'visitor@cms.com',
                'password' => bcrypt("password"),
                'role_id' => 3
            ],
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

        Role::insert([
            [
                'role_name' => 'admin',
            ],
            [
                'role_name' => 'editor',
            ],
            [
                'role_name' => 'visitor',
            ],
        ]);
    }
}
