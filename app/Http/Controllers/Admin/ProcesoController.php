<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proceso;
use Illuminate\Http\Request;

class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $procesos = Proceso::all();
        return view('admin.procesos.index', compact('procesos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.procesos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proceso = Proceso::findOrFail($id);
        return view('admin.procesos.show', compact('proceso'));   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proceso = Proceso::findOrFail($id);
        return view('admin.procesos.edit', compact('proceso'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proceso = Proceso::findOrFail($id);
        $proceso->delete();

        return redirect()->route('admin.procesos.index')->with('success', 'Proceso eliminado exitosamente.');
    }
}
