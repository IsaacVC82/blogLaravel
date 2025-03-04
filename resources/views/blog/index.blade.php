<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-4xl font-bold mb-8">Blog Posts</h1>

        @foreach($posts as $post)
            <div class="mb-6 p-4 border-b">
                <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>
                <p class="text-gray-600 mb-2"><strong>Autor:</strong> {{ $post->name }}</p>
                <p class="text-lg mb-4">{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}</p>
                <a href="{{ route('blog.show', $post->slug) }}" class="text-blue-500 hover:underline">Leer más</a>
            </div>
        @endforeach
    </div>
</body>
</html>