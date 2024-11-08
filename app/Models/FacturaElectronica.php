<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaElectronica extends Model
{
    /** @use HasFactory<\Database\Factories\FacturasElectronicasFactory> */
    use HasFactory;
    
    protected $table = 'factura_electronica';
}
