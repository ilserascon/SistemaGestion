<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganigramaSistema extends Model
{
    use HasFactory;

    protected $table = 'organigrama_sistema'; 
    protected $fillable = [
        'nombre',
        'puesto',
        'telefono',
        'correo',
    ];

    public function valores()
    {
        return $this->hasMany(OrganigramaValores::class, 'personal_id');
    }
}
