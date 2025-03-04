<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',   
        'slug',    
        'title',   
        'content', 
        'image',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    public function getImageAttribute($value)
{
    return asset('storage/' . $value);
}
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}