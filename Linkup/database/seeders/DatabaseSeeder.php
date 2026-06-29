<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $youssef = User::factory()->create([
        'name' => 'Youssef Alami',
        'email' => 'youssef@example.com',
        'headline' => 'Développeur Fullstack PHP / Laravel',
        'company' => 'Freelance',
        'password' => bcrypt('password'), 
    ]);
    Post::factory(5)->create([
        'user_id' => $youssef->id,
    ]);
    User::factory(10)->create([
        'headline' => 'Développeur Web',
        'company' => 'Tech Company',
    ])->each(function ($user) {
        Post::factory(3)->create([
            'user_id' => $user->id,
        ]);
    });
}
}
