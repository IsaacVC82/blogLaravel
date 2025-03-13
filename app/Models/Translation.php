<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $table = 'post_translations'; 

    // Definir los campos que pueden ser llenados
    protected $fillable = ['post_id', 'lang', 'title', 'content'];

    // Relación inversa con Post (cada traducción pertenece a un post)
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
}

