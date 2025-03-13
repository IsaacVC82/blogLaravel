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
        Schema::create('post_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')
                ->constrained('posts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('lang', 5); // Limita el idioma a 5 caracteres ('es', 'en', etc.)
            $table->string('title');
            $table->text('content');
            $table->timestamps();

            $table->unique(['post_id', 'lang']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_translations');
    }
};
