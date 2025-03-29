<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'title',
        'slug',
        'content',
        'image',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relación con las traducciones del post
     */
    public function translations()
    {
        return $this->hasMany(PostTranslation::class);
    }

    /**
     * Obtener una traducción específica por idioma
     */
    public function translation($locale)
    {
        return $this->translations()->where('locale', $locale)->first();
    }

    /**
     * Procesar la imagen con Intervention Image sin guardarla en disco
     */
    public static function processImage($file, $type = 'original')
    {
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file);

        if ($type === 'thumbnail') {
            $image->resize(480, 480, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        return $image->toWebp(90)->toResponse()->header('Content-Type', 'image/webp');
    }
}
