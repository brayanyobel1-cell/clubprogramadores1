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
    Schema::create('inscripciones', function (Blueprint $table) {
        $table->id('inscripciones_id');
        $table->foreignId('eventos_id')->constrained('eventos', 'eventos_id');
        $table->date('fecha_inscripcion');
        $table->foreignId('us_id')->constrained('usuario', 'us_id');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('inscripciones');
}
};
