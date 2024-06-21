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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("email")->constrained('users',indexName: 'email')->onDelete('cascade');;
            $table->string("telephone");
            $table->string("nom");
            $table->string("prenom");
            $table->foreignId("adresseId")->constrained('adresses')->onDelete('cascade');;
            $table->foreignId("panierID")->constrained('paniers')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
