<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('logotipo');
            $table->integer('cantidad_colores');
            $table->string('colores');
            $table->string('tipo_pintura');
            $table->string('ubicacion_estampados');
            $table->string('tamanio');
            $table->integer('cantidad_estampados');
            $table->integer('cantidad_prendas');
            $table->string('tipo_prendas');
            $table->integer('id_orden_trabajo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajos');
    }
};
