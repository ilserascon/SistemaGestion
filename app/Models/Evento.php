<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'inicio', 'fin', 'descripcion', 'etiqueta_id'];

    public function etiqueta()
    {
        return $this->belongsTo(Etiqueta::class);
    }
}