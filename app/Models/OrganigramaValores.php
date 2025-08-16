<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganigramaValores extends Model
{
    use HasFactory;

    protected $table = 'organigrama_sistema_valores';

    protected $fillable = [
        'personal_id',
        'campo_id',
        'valor',
    ];

    public function personal()
    {
        return $this->belongsTo(OrganigramaSistema::class, 'personal_id');
    }

    public function campo()
    {
        return $this->belongsTo(OrganigramaConfiguracion::class, 'campo_id');
    }
}
