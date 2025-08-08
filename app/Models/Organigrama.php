<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organigrama extends Model
{
    protected $table = 'organigramas';

    protected $fillable = [
        'nombre',
        'telefono',
        'correo',
        'puesto',
    ];

    public function valores()
    {
        return $this->hasMany(OrganigramaValor::class, 'personal_id');
    }

    
}



