<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'evento',
        'start_date',
        
    ];

    // 👇 Esto convierte los campos a objetos Carbon (para usar toIso8601String)
    protected $casts = [
        'start_date' => 'datetime',
     
    ];
}
