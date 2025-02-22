<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    // Agregar los campos que quieres permitir para la asignación masiva
    protected $fillable = [
        'title',
        'content',
    ];
}