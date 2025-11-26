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
    Schema::create('eventos', function (Blueprint $table) {
        $table->id('eventos_id');
        $table->string('titulo', 150);
        $table->string('descripcion', 255);
        $table->date('fecha_inicio');
        $table->date('fecha_fin');
        $table->string('lugar', 150);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('eventos');
}
};
