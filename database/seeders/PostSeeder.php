<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
       // Genera 10 posts usando el factory
       \App\Models\Post::factory(10)->create();
    }
}

