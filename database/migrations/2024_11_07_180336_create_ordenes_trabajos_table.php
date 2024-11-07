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
        Schema::create('ordenes_trabajos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_cracion');
            $table->integer('total_cantidad_estampados');
            $table->integer('total_cantidad_prendas');
            $table->integer('id_cliente');
            $table->string('descripcion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes_trabajos');
    }
};
