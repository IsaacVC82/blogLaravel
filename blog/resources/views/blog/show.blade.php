<!DOCTYPE html>
<html lang="es">

<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
    <div class="prose">
        {!! $post->content !!}
    </div>
</div>
