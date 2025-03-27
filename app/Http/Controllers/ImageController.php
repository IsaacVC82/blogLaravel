<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    public function processImage($filename)
{
    $manager = new ImageManager(new Driver());
    
    try {
        $path = "posts/{$filename}";
        
        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }

        $image = $manager->read(Storage::disk('public')->path($path));
        
        return new Response(
            $image->toWebp(),
            200,
            [
                'Content-Type' => 'image/webp',
                'Content-Disposition' => 'inline; filename="'.$filename.'"'
            ]
        );
        
    } catch (\Exception $e) {
        abort(500, "Error al procesar la imagen");
    }
}
}