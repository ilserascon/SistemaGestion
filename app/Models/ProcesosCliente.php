<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcesosCliente extends Model
{
    use HasFactory;

    protected $table = 'procesos_cliente'; 
    
    protected $fillable = 
    [
        'cliente_id', 
        'proceso_id', 
        'validado',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function proceso()
    {
        return $this->belongsTo(Proceso::class);
    }
}
