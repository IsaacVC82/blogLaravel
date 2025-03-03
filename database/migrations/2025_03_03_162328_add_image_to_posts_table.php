<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('image')->nullable();  // Agrega la columna 'image'
        });
    }
    
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('image');  // Elimina la columna 'image' si se revierte la migración
        });
    }
    
};
