<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'image')) {
                $table->string('image')->nullable();
            }
        });
    }
    
    
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('image');  // Elimina la columna 'image' si se revierte la migración
        });
    }
    
};
