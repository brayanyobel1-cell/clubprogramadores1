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
    Schema::create('contacto', function (Blueprint $table) {
        $table->id('id_contacto');
        $table->string('Nombre', 100);
        $table->foreignId('us_id')->constrained('usuario', 'us_id');
        $table->string('correo', 100);
        $table->string('Asunto', 100);
        $table->string('Mensaje', 255);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('contacto');
}
};
