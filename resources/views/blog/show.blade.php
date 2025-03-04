<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
        <p class="text-gray-600 mb-4">Publicado el: {{ $post->published_at ?? 'Fecha no disponible' }}</p>
        @if($post->image)
        <img src="{{ asset('storage/images/' . basename($post->image)) }}" alt="Imagen del post" class="w-300px h-auto rounded-xl mb-4">
        @endif
        <p class="text-lg leading-relaxed mb-4">{{ $post->excerpt }}</p>
        <div class="prose max-w-none">{!! $post->content !!}</div>
    </div>
</body>
</html>

