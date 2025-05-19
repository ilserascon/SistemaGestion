<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'rfc',
        'razon_social',
        'direccion',
        'colonia',
        'numero_interior',
        'numero_exterior',
        'codigo_postal',
        'localidad',
        'ciudad',
        'estado',
        'correo',
        'telefono',
        'celular',
        'borrado',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
