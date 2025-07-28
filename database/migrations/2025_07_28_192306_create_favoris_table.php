<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
    {
        Schema::create('favoris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etudiant_id');
            $table->unsignedBigInteger('support_id');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('etudiant_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('support_id')
                  ->references('id')
                  ->on('supports')
                  ->onDelete('cascade');

            // Unicité pour éviter les doublons
            $table->unique(['etudiant_id','support_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('favoris');
    }

};
