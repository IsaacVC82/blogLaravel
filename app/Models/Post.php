<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'title',
        'content',
        'image',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'slug' => $this->slug,
            'image_url' => asset('storage/' . $this->image),
        ];
    }

    // Relación uno a muchos con PostTranslation
    public function translations()
    {
        return $this->hasMany(PostTranslation::class);
    }
    

    // Obtener una traducción específica por 'locale'
    public function translation($locale)
    {
        return $this->translations()->where('locale', $locale)->first();
    }
}

