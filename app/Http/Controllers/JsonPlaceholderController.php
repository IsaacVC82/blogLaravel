<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JsonPlaceholderController extends Controller
{
    // Obtener todos los posts
    public function getPosts()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        // Verifica si la solicitud fue exitosa
        if ($response->successful()) {
            // Devuelve los posts en formato JSON
            return response()->json($response->json());
        } else {
            // Si hubo un error, retorna un mensaje
            return response()->json(['message' => 'No se pudieron obtener los posts'], 500);
        }
    }

    // Obtener un post específico por ID
    public function getPost($id)
    {
        $response = Http::get("https://jsonplaceholder.typicode.com/posts/{$id}");

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }
    }

    // Obtener todos los usuarios
    public function getUsers()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['message' => 'No se pudieron obtener los usuarios'], 500);
        }
    }
}

