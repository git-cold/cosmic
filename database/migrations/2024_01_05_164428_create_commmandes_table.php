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
        Schema::create('commmandes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("etatCommandeID")->constrained("etat_commandes")->onDelete('cascade');;
            $table->foreignId("panierID")->constrained("paniers")->onDelete('cascade');;
            $table->foreignId("clientID")->constrained("clients")->onDelete('cascade');;
            $table->foreignId("adresseID")->constrained("adresses")->onDelete('cascade');;
            $table->foreignId("livID")->constrained("livraisons")->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commmandes');
    }
};
