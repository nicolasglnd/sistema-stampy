<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostoFinal extends Model
{
    /** @use HasFactory<\Database\Factories\CostosFinalesFactory> */
    use HasFactory;

    protected $table = 'costos_finales';
}
