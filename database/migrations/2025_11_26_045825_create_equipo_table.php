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
    Schema::create('equipo', function (Blueprint $table) {
        $table->id('id_equipo');
        $table->string('nombre_equipo', 150);
        $table->string('descripcion', 255);
        $table->date('fecha_creacion');
        $table->foreignId('us_id')->constrained('usuario', 'us_id');
        $table->foreignId('rol_id')->constrained('rol', 'rol_id');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('equipo');
}
};
