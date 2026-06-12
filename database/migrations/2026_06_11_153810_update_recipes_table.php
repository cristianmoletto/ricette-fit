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
        Schema::table('recipes', function (Blueprint $table) {
           
            $table->float('kcal')->change();
            $table->float('pro')->change();
            $table->float('carb')->change();
            $table->float('fat')->change();
            $table->integer('prep_time')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recipes', function (Blueprint $table) {
            
            $table->string('kcal')->change();
            $table->string('pro')->change();
            $table->string('carb')->change();
            $table->string('fat')->change();
            $table->string('prep_time')->change();

        });
    }
};
