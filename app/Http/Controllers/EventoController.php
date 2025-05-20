<?php
namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        return view('agenda.index');
    }

    public function eventos()
    {
        $eventos = Evento::with('etiqueta')->get();
        return response()->json($eventos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'inicio' => 'required|date',
            'fin' => 'nullable|date|after_or_equal:inicio',
            'descripcion' => 'nullable|string',
            'etiqueta_id' => 'nullable|exists:etiquetas,id',
        ]);

        $evento = Evento::create($request->all());
        return response()->json($evento, 201);
    }
}