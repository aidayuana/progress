<?php

namespace Database\Seeders;

use App\Models\MasterData\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create(['name' => $name = 'Laravel', 'slug' => Str::slug($name)]);
        Tag::create(['name' => $name = 'React', 'slug' => Str::slug($name)]);
        Tag::create(['name' => $name = 'Vue', 'slug' => Str::slug($name)]);
    }
}
