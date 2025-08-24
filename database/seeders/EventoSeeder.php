<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventos = [
            [
                'evento' => 'Conferencia de Tecnología',
                'start_date' => '2025-10-01 09:00:00',
                
            ],
            [
                'evento' => 'Reunión de Equipo',
                'start_date' => '2025-10-05 14:00:00',
                
            ],
            [
                'evento' => 'Lanzamiento de Producto',
                'start_date' => '2025-08-24 10:00:00',
                
            ],
        ];

        foreach ($eventos as $evento) {
            Evento::create($evento);
        }
    }
}

