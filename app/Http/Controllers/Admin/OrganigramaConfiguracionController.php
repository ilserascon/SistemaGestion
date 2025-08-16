<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganigramaConfiguracion;
use Illuminate\Http\Request;

class OrganigramaConfiguracionController extends Controller
{
    public function index()
    {
        $campos = OrganigramaConfiguracion::all();
        return view('admin.organigrama_configuracion.index', compact('campos'));
    }

    public function create()
    {
        return view('admin.organigrama_configuracion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_campo' => 'required|string|max:100|unique:organigrama_configuracion,nombre_campo',
            'etiqueta' => 'nullable|string|max:100',
            'tipo_dato' => 'required|in:texto,numero,fecha,booleano',
            'requerido' => 'boolean',
            'activo' => 'boolean',
        ]);

        OrganigramaConfiguracion::create([
            'nombre_campo' => $request->nombre_campo,
            'etiqueta' => $request->etiqueta,
            'tipo_dato' => $request->tipo_dato,
            'requerido' => $request->has('requerido'),
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('admin.organigrama_configuracion.index')->with('success', 'Campo creado correctamente.');
    }

    public function edit(OrganigramaConfiguracion $organigramaConfiguracion)
    {
        return view('admin.organigrama_configuracion.edit', compact('organigramaConfiguracion'));
    }

    public function update(Request $request, OrganigramaConfiguracion $organigramaConfiguracion)
    {
        $request->validate([
            'nombre_campo' => 'required|string|max:100|unique:organigrama_configuracion,nombre_campo,' . $organigramaConfiguracion->id,
            'etiqueta' => 'nullable|string|max:100',
            'tipo_dato' => 'required|in:texto,numero,fecha,booleano',
            'requerido' => 'boolean',
            'activo' => 'boolean',
        ]);

        $organigramaConfiguracion->update([
            'nombre_campo' => $request->nombre_campo,
            'etiqueta' => $request->etiqueta,
            'tipo_dato' => $request->tipo_dato,
            'requerido' => $request->has('requerido'),
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('admin.organigrama_configuracion.index')->with('success', 'Campo actualizado correctamente.');
    }

    public function destroy(OrganigramaConfiguracion $organigramaConfiguracion)
    {
        $organigramaConfiguracion->delete();
        return redirect()->route('admin.organigrama_configuracion.index')->with('success', 'Campo eliminado correctamente.');
    }
}
