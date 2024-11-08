<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    /** @use HasFactory<\Database\Factories\EmpleadosFactory> */
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = [
        'id',
        'eps',
        'activo',
        'logro_academico',
        'arl',
        'caja_compensacion',
        'fondo_pension',
        'salario',
        'id_rol',
        'email',
        'fecha_nacimiento',
    ];

    public function persona() {
        return $this->belongsTo(Persona::class, 'id');
    }

    public function rol() {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
}
