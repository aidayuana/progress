<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create(['title' => $title = fake()->sentence(4), 'description' => fake()->sentence(10), 'slug' => Str::slug($title)])->tags()->attach(rand(1, 3));
        Article::create(['title' => $title = fake()->sentence(4), 'description' => fake()->sentence(10), 'slug' => Str::slug($title)])->tags()->attach(rand(1, 3));
        Article::create(['title' => $title = fake()->sentence(4), 'description' => fake()->sentence(10), 'slug' => Str::slug($title)])->tags()->attach(rand(1, 3));
    }
}
