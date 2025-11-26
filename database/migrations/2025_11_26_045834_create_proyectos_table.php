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
    Schema::create('proyectos', function (Blueprint $table) {
        $table->id('proyectos_id');
        $table->string('us_nombre', 150);
        $table->string('descripcion', 150);
        $table->string('repositorio_url', 255);
        $table->date('fecha_creacion');
        $table->foreignId('creador_id')->constrained('usuario', 'us_id');
        $table->foreignId('id_equipo')->constrained('equipo', 'id_equipo');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('proyectos');
}
};
