<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    /** @use HasFactory<\Database\Factories\OrdenesTrabajoFactory> */
    use HasFactory;

    protected $table = 'orden_trabajo';

    protected $fillable = [
        'total_cantidad_estampados',
        'total_cantidad_prendas',
        'id_cliente',
        'descripcion',
    ];

    public function dashboard() {
        return $this->hasOne(Dashboard::class, 'id');
    }

    public function costoFinal() {
        return $this->hasOne(CostoFinal::class, 'id');
    }


    public function cliente() {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}