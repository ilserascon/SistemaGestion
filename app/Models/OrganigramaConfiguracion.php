<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganigramaConfiguracion extends Model
{
    protected $table = 'organigrama_configuracion';

    protected $fillable = [
        'nombre_campo',
        'etiqueta',
        'tipo_dato',
        'requerido',
        'activo',
    ];
    
}


