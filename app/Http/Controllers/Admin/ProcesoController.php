<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proceso;
use Illuminate\Http\Request;

class ProcesoController extends Controller
{
    public function index()
    {        
        $procesos = Proceso::all();
        return view('admin.procesos.index', compact('procesos'));
    }


    public function create()
    {
        return view('admin.procesos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'actividad' => 'required',
            'responsable' => 'required',
            'desarrollo' => 'required',
            'fecha_entregable' => 'nullable|date',
            'fecha_finalizado' => 'nullable|date',
            'tipo' => 'required',
            'liga' => 'nullable|url',
            'mensaje' => 'nullable|string|max:255'
        ]);

        Proceso::create($request->all());

        return redirect()->route('admin.procesos.index')->with('success', 'Proceso creado exitosamente.');
    }

 
    public function show(string $id)
    {
        $proceso = Proceso::findOrFail($id);
        return view('admin.procesos.show', compact('proceso'));   
    }

   
    public function edit(string $id)
    {
        $proceso = Proceso::findOrFail($id);
        return view('admin.procesos.edit', compact('proceso'));
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'actividad' => 'required',
            'responsable' => 'required',
            'desarrollo' => 'required',
            'fecha_entregable' => 'nullable|date',
            'fecha_finalizado' => 'nullable|date',
            'tipo' => 'required',
            'liga' => 'nullable|url',
            'mensaje' => 'nullable|string|max:255'
        ]);

        $proceso = Proceso::findOrFail($id);
        $proceso->update($request->all());

        return redirect()->route('admin.procesos.index')->with('success', 'Proceso actualizado exitosamente.');
    }


    public function destroy(string $id)
    {
        $proceso = Proceso::findOrFail($id);
        $proceso->delete();

        return redirect()->route('admin.procesos.index')->with('success', 'Proceso eliminado exitosamente.');
    }
}
