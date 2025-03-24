<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    /**
     * Devuelve todos los posts, con o sin traducción en el idioma solicitado.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Validar el idioma
        $validLanguages = ['es', 'en'];
        $lang = $request->input('lang', 'es'); // Idioma por defecto: 'es'

        if (!in_array($lang, $validLanguages)) {
            return response()->json(['message' => 'Invalid language'], 400);
        }

        // Obtener todos los posts, con o sin traducción
        $posts = Post::with(['translations' => function ($query) use ($lang) {
            $query->where('locale', $lang); // Cargar solo la traducción en el idioma solicitado
        }])->select('id', 'slug', 'image', 'created_at', 'updated_at', 'title', 'content') // Incluir campos predeterminados
           ->orderBy('created_at', 'desc')
           ->get();

        // Formatear los posts
        $formattedPosts = $posts->map(function ($post) use ($lang) {
            $translation = $post->translations->first();

            return [
                'id' => $post->id,
                'slug' => $post->slug,
                'title' => $translation ? $translation->title : $post->title, // Usar traducción o valor predeterminado
                'content' => $translation ? $translation->content : $post->content, // Usar traducción o valor predeterminado
                'image' => $post->image,
                'image_url' => $post->image ? asset('storage/' . $post->image) : null,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
                'locale' => $translation ? $translation->locale : $lang,
            ];
        });

        return response()->json([
            'data' => $formattedPosts,
        ]);
    }

    /**
     * Devuelve un post específico por su slug, con o sin traducción en el idioma solicitado.
     *
     * @param string $slug
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($slug, Request $request)
    {
        // Validar el idioma
        $validLanguages = ['es', 'en'];
        $lang = $request->input('lang', 'es'); // Idioma por defecto: 'es'

        if (!in_array($lang, $validLanguages)) {
            return response()->json(['message' => 'Invalid language'], 400);
        }

        // Buscar el post por el slug
        $post = Post::where('slug', $slug)->select('id', 'slug', 'image', 'created_at', 'updated_at', 'title', 'content')->firstOrFail();

        // Obtener la traducción para el idioma solicitado (si existe)
        $translation = $post->translations()->where('locale', $lang)->first();

        return response()->json([
            'data' => [
                'id' => $post->id,
                'slug' => $post->slug,
                'title' => $translation ? $translation->title : $post->title, 
                'content' => $translation ? $translation->content : $post->content, 
                'image' => $post->image,
                'image_url' => $post->image ? asset('storage/' . $post->image) : null,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
                'locale' => $lang,
            ],
        ]);
    }
}