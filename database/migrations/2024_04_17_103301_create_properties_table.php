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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('localisation');
            $table->integer('m2');
            $table->string('type');
            $table->enum('etat', ['neuf', 'Rénové', 'plateau']);
            $table->integer('nombre_chambres');  // Correction ici
            $table->integer('nombre_salles_de_bain');  // Correction ici
            $table->boolean('parking')->default(false);
            $table->boolean('garage')->default(false);
            $table->boolean('terrain')->default(false);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
