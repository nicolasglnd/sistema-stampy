<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    /** @use HasFactory<\Database\Factories\OrdenesTrabajoFactory> */
    use HasFactory;

    protected $table = 'orden_trabajo';
}
