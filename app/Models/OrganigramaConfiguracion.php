<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganigramaConfiguracion extends Model
{
    use HasFactory;

    protected $table = 'organigrama_configuracion';

    protected $fillable = [
        'nombre_campo',
        'etiqueta',
        'tipo_dato',
        'requerido',
        'activo',
    ];

    public function valores()
    {
        return $this->hasMany(OrganigramaValores::class, 'campo_id');
    }
}
