<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    /** @use HasFactory<\Database\Factories\TrabajosFactory> */
    use HasFactory;

    protected $table = 'trabajos';
}
