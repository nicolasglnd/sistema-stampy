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
        Schema::create('costos_finales', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_dibujos');
            $table->decimal('costo_dibujos');
            $table->decimal('costo_grabados');
            $table->decimal('costo_estampados');
            $table->integer('id_orden_trabajo');
            $table->integer('id_cliente');
            $table->decimal('costo_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costos_finales');
    }
};
