<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('valeur'); // Note de 1 à 5 (étoiles)
            $table->foreignId('etudiant_id')       // Utilisateur qui a évalué
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->foreignId('support_id')        // Support évalué
                  ->constrained('supports')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
