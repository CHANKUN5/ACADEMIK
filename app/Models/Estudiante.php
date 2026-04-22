<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
        'nombre',
        'email',
        'edad',
        'curso',
        'promedio',
        'fecha_registro',
        'activo',
    ];

    protected $casts = [
        'fecha_registro' => 'date',
        'activo' => 'boolean',
        'promedio' => 'decimal:2',
    ];
}
