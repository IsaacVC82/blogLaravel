<?php
use App\Models\Post;
use App\Http\Controllers\PostController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;

Route::prefix('admin')->group(function () {
    
});

// Rutas del blog (frontend)
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/{lang}/posts', [PostController::class, 'index'])->where(['lang' => 'es|en']);  // Muestra todos los posts

// Ruta para obtener un post específico
Route::get('/{lang}/posts/{slug}', [PostController::class, 'show'])->where(['lang' => 'es|en']);

// Página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Ruta para procesar y servir imágenes sin guardarlas en disco
Route::get('/images/{post}/{type}', function (Post $post, $type) {
    if (!$post->image) {
        abort(404);
    }
    
    $manager = new ImageManager(new Driver());
    $image = $manager->read(file_get_contents(storage_path('app/public/' . $post->image)));
    
    if ($type === 'thumbnail') {
        $image->resize(480, 480, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
    }
    
    return $image->toWebp(90)
        ->toResponse()
        ->header('Content-Type', 'image/webp');
})->name('image.display');





