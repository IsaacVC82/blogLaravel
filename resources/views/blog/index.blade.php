
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <h1>Blog Posts</h1>

    @foreach($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>
        <p><strong>Autor:</strong> {{ $post->name }}</p>
        <p>{{ $post->content }}</p>
        <a href="{{ route('blog.show', $post->slug) }}">Read more</a>
    </div>
@endforeach

</body>
</html>