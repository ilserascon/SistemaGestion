<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    // Mostrar todos los eventos
    public function index()
    {
        $all_events = Evento::all();

        $eventos = [];

        foreach ($all_events as $evento) {
            $eventos[] = [
                'id'    => $evento->id,          // importante para identificar eventos en JS
                'title' => $evento->evento,       // nombre o título del evento
                'start' => $evento->start_date,  // fecha y hora de inicio
                'end'   => $evento->end_date,    // fecha y hora de fin (opcional)
            ];
        }

        return view('admin.agenda.index', compact('eventos'));
    }

    // Mostrar formulario para crear evento
    public function create()
    {
        return view('admin.agenda.create');
    }

    // Guardar nuevo evento
    public function store(Request $request)
    {
        $request->validate([
            'evento' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Evento::create([
            'evento' => $request->evento,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('admin.agenda.index')->with('success', 'Cita creada correctamente.');
    }

    // Eliminar evento (para que funcione el botón de eliminar en JS)
    public function destroy($id)
    {
        $evento = Evento::find($id);

        if (!$evento) {
            return response()->json([
                'success' => false,
                'message' => 'Evento no encontrado'
            ], 404);
        }

        $evento->delete();

        return response()->json([
            'success' => true,
            'message' => 'Evento eliminado correctamente'
        ]);
    }
}
