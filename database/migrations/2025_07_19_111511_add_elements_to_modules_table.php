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
    Schema::table('modules', function (Blueprint $table) {
        $table->text('elements')->nullable(); // ou string si c’est court
    });
}

public function down()
{
    Schema::table('modules', function (Blueprint $table) {
        $table->dropColumn('elements');
    });
}

};
