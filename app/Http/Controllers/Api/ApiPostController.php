<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    public function index(Request $request)
    {
        // Validar el idioma
        $validLanguages = ['es', 'en'];
        $lang = $request->input('lang', 'es');

        if (!in_array($lang, $validLanguages)) {
            return response()->json(['message' => 'Invalid language'], 400);
        }

        // Obtener los posts con traducción en el idioma solicitado
        $posts = Post::whereHas('translations', function ($query) use ($lang) {
            $query->where('locale', $lang);
        })->with(['translations' => function ($query) use ($lang) {
            $query->where('locale', $lang)->select('post_id', 'title', 'content', 'locale');
        }])->select('id', 'slug', 'image', 'created_at', 'updated_at')
           ->paginate(10);

        // Verificar si no hay resultados
        if ($posts->isEmpty()) {
            return response()->json(['message' => 'No posts found for the selected language'], 404);
        }

        // Formatear los posts
        $formattedPosts = $posts->getCollection()->map(function ($post) use ($lang) {
            $translation = $post->translations->first();

            return [
                'id' => $post->id,
                'slug' => $post->slug,
                'title' => $translation ? $translation->title : $post->title,
                'content' => $translation ? $translation->content : $post->content,
                'image' => $post->image,
                'image_url' => $post->image ? asset('storage/' . $post->image) : null,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
                'locale' => $translation ? $translation->locale : $lang,
            ];
        });

        return response()->json([
            'data' => $formattedPosts,
            'pagination' => [
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'per_page' => $posts->perPage(),
                'total' => $posts->total(),
            ],
        ]);
    }

    public function show($slug, Request $request)
    {
        // Validar el idioma
        $validLanguages = ['es', 'en'];
        $lang = $request->input('lang', 'es');

        if (!in_array($lang, $validLanguages)) {
            return response()->json(['message' => 'Invalid language'], 400);
        }

        // Buscar el post por el slug
        $post = Post::where('slug', $slug)->firstOrFail();

        // Obtener la traducción para el idioma solicitado
        $translation = $post->translations()->where('locale', $lang)->first();

        // Si no hay traducción, usar los valores originales del post
        $title = $translation ? $translation->title : $post->title;
        $content = $translation ? $translation->content : $post->content;

        return response()->json([
            'data' => [
                'id' => $post->id,
                'slug' => $post->slug,
                'title' => $title,
                'content' => $content,
                'image' => $post->image,
                'image_url' => $post->image ? asset('storage/' . $post->image) : null,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
                'locale' => $lang,
            ],
        ]);
    }
}




