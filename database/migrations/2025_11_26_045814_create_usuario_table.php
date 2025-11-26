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
    Schema::create('usuario', function (Blueprint $table) {
        $table->id('us_id');
        $table->string('us_nombre', 100);
        $table->string('us_apellido', 100);
        $table->string('us_password', 255);
        $table->string('us_email', 150);
        $table->date('fecha_registro');
        $table->foreignId('rol_id')->constrained('rol', 'rol_id');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('usuario');
}
};
