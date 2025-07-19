<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Titre du module
            $table->foreignId('formation_id') // Référence à la formation
                  ->constrained('formations')
                  ->onDelete('cascade'); // Si formation supprimée, supprime les modules liés
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
