<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
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
     * Convertir el modelo a array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'slug' => $this->slug,
            'image' => $this->image,
            'image_url' => $this->getImageUrlAttribute(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'translations' => $this->translations,
        ];
    }

    /**
     * Accesor para la URL completa de la imagen
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    /**
     * Subir y convertir imagen a WebP
     *
     * @param Request $request
     * @param string $fieldName
     * @param string $directory
     * @return string|null
     */

     public static function uploadImage(Request $request, $fieldName = 'image', $directory = 'posts')
     {
         if (!$request->hasFile($fieldName)) {
             return null;
         }
     
         // Validar que sea una imagen (PNG/JPG)
         $request->validate([
             $fieldName => 'required|image|mimes:png,jpg,jpeg|max:2048',
         ]);
     
         // Forzar nombre con extensión .webp
         $imageName = time() . '_' . uniqid() . '.webp'; 
         $storagePath = 'public/' . $directory . '/' . $imageName;
     
         //  Convertir a WebP con Intervention Image
         $image = Image::make($request->file($fieldName))
             ->encode('webp', 90); // Calidad 90%
     
         Storage::put($storagePath, (string) $image);
     
         return $directory . '/' . $imageName; 
     }

    /**
     * Eliminar la imagen asociada al post
     */
    public function deleteImage()
    {
        if ($this->image && Storage::exists('public/' . $this->image)) {
            Storage::delete('public/' . $this->image);
        }
    }

    /**
     * Eliminar el post junto con su imagen y traducciones
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            // Eliminar imagen
            $post->deleteImage();
            
            // Eliminar traducciones
            $post->translations()->delete();
        });
    }
}