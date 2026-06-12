<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * - recipes — entità principale (nome, descrizione, calorie, proteine, carboidrati, grassi, tempo_preparazione, immagine)
     *  categories — es. Colazione, Pranzo, Cena, Spuntino (N-N con recipes)
     *   ingredients — lista ingredienti (N-N con recipes tramite tabella pivot ingredient_recipe con campo quantity)
     * 
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->longText('description');
            $table->string('kcal');
            $table->string('pro');
            $table->string('carb');
            $table->string('fat');
            $table->string('prep_time');
            $table->string('image');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
