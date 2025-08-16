<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organigrama extends Model
{
    use HasFactory;

    protected $table = 'organigramas';

    protected $fillable = [
        'empresa_id',
        'nombre',
        'telefono',
        'correo',
        'puesto',
    ];

    public function valores()
    {
        return $this->hasMany(OrganigramaValores::class, 'personal_id');
    }
}
