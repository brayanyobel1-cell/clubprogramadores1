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
    Schema::create('rol', function (Blueprint $table) {
        $table->id('rol_id');
        $table->string('us_nombre', 50);
        $table->string('descripcion', 150);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('rol');
}
};
