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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('eps');
            $table->boolean('activo');
            $table->string('logro_academico');
            $table->string('arl');
            $table->string('caja_compensacion');
            $table->string('fondo_pension');
            $table->decimal('salario');
            $table->integer('id_rol');
            $table->string('email');
            $table->date('fecha_nacimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
