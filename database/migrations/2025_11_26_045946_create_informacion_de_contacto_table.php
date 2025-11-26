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
    Schema::create('informacion_de_contacto', function (Blueprint $table) {
        $table->id('id_Informacion');
        $table->string('Direccion', 100);
        $table->string('Correo', 100);
        $table->string('Redes_sociales', 50);
        $table->foreignId('id_contacto')->constrained('contacto', 'id_contacto');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('informacion_de_contacto');
}
};
