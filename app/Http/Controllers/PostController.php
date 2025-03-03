<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Obtener todos los posts
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    // Crear un nuevo post
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $imagePath = $request->hasFile('image') 
            ? $request->file('image')->store('images', 'public')
            : null;

        $post = Post::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return response()->json(['message' => 'Post creado correctamente', 'post' => $post]);
    }

    // Obtener un post por su slug
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return response()->json($post);
    }

    // Actualizar un post
    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255|unique:posts,slug,' . $post->id,
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('images', 'public');
        }

        $post->update($request->only('name', 'slug', 'title', 'content', 'image'));

        return response()->json(['message' => 'Post actualizado correctamente', 'post' => $post]);
    }

    // Eliminar un post
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->delete();

        return response()->json(['message' => 'Post eliminado correctamente']);
    }
}

