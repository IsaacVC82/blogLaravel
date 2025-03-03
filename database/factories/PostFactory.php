<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(3); // Título único de 3 palabras

        return [
            'name' => $this->faker->name(),
            'slug' => Str::slug($title) . '-' . Str::random(5), // slug único
            'title' => $title,
            'content' => $this->faker->paragraph(4), // Párrafo con 4 oraciones
            'image' => 'images/' . $this->faker->image('storage/app/public/images', 640, 480, null, false), // Genera una imagen falsa
        ];
    }
}

