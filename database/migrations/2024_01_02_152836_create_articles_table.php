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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom');
            $table->float("prix");
            $table->integer("qteStock");
            $table->integer("tauxRemise")->nullable();
            $table->string("articleImg");
            $table->text("artDescr");
            $table->string("color1");
            $table->string("color2")->nullable();
            $table->string("materiaux");
            $table->string("accroche");
            $table->string("style");
            $table->string("couleurFiltre");
            $table->string("materiauxFiltre");
            $table->foreignId("catID")->constrained('categories')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
