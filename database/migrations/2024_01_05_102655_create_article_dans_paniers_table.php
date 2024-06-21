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
        Schema::create('article_dans_paniers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("panierID")->constrained('paniers')->onDelete('cascade');;
            $table->foreignId("articleID")->constrained('articles')->onDelete('cascade');;
            $table->integer("quantite");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_dans_paniers');
    }
};
