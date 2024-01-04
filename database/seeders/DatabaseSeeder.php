<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@admin',
                'password' => bcrypt('123'),
                'is_admin' => true
            ]
        );

        User::create(
            [
                'name' => 'User',
                'email' => 'user@user',
                'password' => bcrypt('123'),
                'is_admin' => false
            ]
        );

        User::factory(3)->create();
        Post::factory()->count(10)->create();
        Comment::factory()->count(30)->create();
    }
}
