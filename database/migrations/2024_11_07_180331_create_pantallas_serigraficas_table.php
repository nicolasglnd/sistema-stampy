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
        Schema::create('pantallas_serigraficas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->dateTime('fecha_creacion');
            $table->dateTime('fecha_modificacion');
            $table->integer('id_pantalla_fisica')->nullable();
            $table->string('constancia_eliminacion')->nullable();
            $table->string('ruta_dibujo');
            $table->string('ruta_imagen_original');
            $table->integer('id_usuario');
            $table->integer('id_orden_trabajo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pantallas_serigraficas');
    }
};
