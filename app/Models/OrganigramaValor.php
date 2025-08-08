<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganigramaValor extends Model
{
    protected $table = 'organigrama_valores';

    protected $fillable = [
        'personal_id',
        'campo_id',
        'valor',
    ];

    public function personal()
    {
        return $this->belongsTo(Organigrama::class, 'personal_id');
    }

    public function configuracion()
    {
        return $this->belongsTo(OrganigramaConfiguracion::class, 'campo_id');
    }
}



