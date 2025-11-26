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
    Schema::create('articulos', function (Blueprint $table) {
        $table->id('articulos_id');
        $table->string('titulo', 200);
        $table->text('contenido');
        $table->date('fecha_publicacion');
        $table->foreignId('autor_id')->constrained('usuario', 'us_id');
        $table->foreignId('inscripciones_id')->constrained('inscripciones', 'inscripciones_id');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('articulos');
}
};
