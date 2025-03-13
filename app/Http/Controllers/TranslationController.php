<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function index(Request $request)
    {
        $translations = Translation::all();

        // Devolver las traducciones como JSON
        return response()->json($translations);
    }
}
