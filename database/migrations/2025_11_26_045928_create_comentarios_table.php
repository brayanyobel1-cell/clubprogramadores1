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
    Schema::create('comentarios', function (Blueprint $table) {
        $table->id('comentarios_id');
        $table->foreignId('usuario_id')->constrained('usuario', 'us_id');
        $table->text('contenido');
        $table->date('fecha_comentario');
        $table->foreignId('articulos_id')->constrained('articulos', 'articulos_id');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('comentarios');
}
};
