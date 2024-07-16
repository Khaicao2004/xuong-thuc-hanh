<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Image;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        $this->call([
            ArticleSeeder::class,
            ImageSeeder::class,
            VideoSeeder::class,
            CommentSeeder::class,
            RatingSeeder::class,
        ]);
    }
}
