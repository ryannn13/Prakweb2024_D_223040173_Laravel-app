<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //   'name' => 'Test User',
        //   'email' => 'test@example.com',
        // ]);

        $ryan = User::create([
            'name' => 'Ryan Hidayat',
            'username' => 'Ryan',
            'email' => 'ryan.223040173@unpas.ac.id',
            'email_verified' => now(),
            'password' => Hash::make('password'),
            'remember_token' => 'Str::random(10)'
        ]);

        // Category::create([
        //     'name' => 'Web Design',
        //     'slug' => 'web-design'
        // ]);

        // Post::create([
        //     'title' => 'Judul Artikel 1',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'judul-artikel-1',
        //     'body' => 'Semester 5 SEMANGAT'
        // ]);

        $this->call([CategorySeeder::class, UserSeeder::class]);
        Post::factory(20)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
