<?php

namespace Database\Seeders;

use App\Models\User;
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
        $youssef = \App\Models\User::factory()->create([
        'name' => 'Youssef Alami',
        'email' => 'youssef@example.com',
        'headline' => 'Développeur Fullstack PHP / Laravel',
        'company' => 'Freelance',
        'password' => bcrypt('password'), 
    ]);

    \App\Models\Post::factory(5)->create([
        'user_id' => $youssef->id,
    ]);
    \App\Models\User::factory(10)->create([
        'headline' => 'Développeur Web',
        'company' => 'Tech Company',
    ])->each(function ($user) {
        \App\Models\Post::factory(3)->create([
            'user_id' => $user->id,
        ]);
    });
}
}
