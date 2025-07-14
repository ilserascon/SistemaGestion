<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Cliente;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $clienteId = session('cliente_seleccionado');

        if ($clienteId) {
            $empresas = Empresa::where('borrado', 1)
                                ->where('cliente_id', $clienteId)
                                ->get();
        } else {
            $empresas = collect();
        }

        return view('admin.empresas.index', compact('empresas'));
    }


    public function create()
    {
        return view('admin.empresas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'rfc' => 'required|string|max:13|unique:empresas,rfc',
            'razon_social' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'colonia' => 'required|string|max:100',
            'numero_interior' => 'nullable|string|max:10',
            'numero_exterior' => 'required|string|max:10',
            'codigo_postal' => 'required|string|max:10',
            'localidad' => 'required|string|max:100',
            'ciudad' => 'required|string|max:100',
            'estado' => 'required|string|max:100',
            'correo' => 'required|email|unique:empresas,correo',
            'telefono' => 'nullable|string|max:20',
            'celular' => 'nullable|string|max:20',
        ]);

            $empresa = new Empresa($request->all());

            $cliente_id = session('cliente_seleccionado');
            if ($cliente_id) {
                $empresa->cliente_id = $cliente_id;
            }

            $empresa->save();

            return redirect()->route('admin.empresas.index')->with('success', 'Empresa creada correctamente.');
    }

    public function show(Empresa $empresa)
    {
        return view('admin.empresas.show', compact('empresa'));
    }

    public function edit(Empresa $empresa)
    {
        return view('admin.empresas.edit', compact('empresa'));
    }

    public function update(Request $request, Empresa $empresa)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'rfc' => 'required|string|max:13|unique:empresas,rfc,' . $empresa->id,
            'razon_social' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'colonia' => 'required|string|max:100',
            'numero_interior' => 'nullable|string|max:10',
            'numero_exterior' => 'required|string|max:10',
            'codigo_postal' => 'required|string|max:10',
            'localidad' => 'required|string|max:100',
            'ciudad' => 'required|string|max:100',
            'estado' => 'required|string|max:100',
            'correo' => 'required|email|unique:empresas,correo,' . $empresa->id,
            'telefono' => 'nullable|string|max:20',
            'celular' => 'nullable|string|max:20',
        ]);

        $empresa->update($request->all());

        return redirect()->route('admin.empresas.index')->with('success', 'Empresa actualizada correctamente.');

    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->borrado = 0;
        $empresa->save();

        return redirect()->route('admin.empresas.index')->with('danger', 'Empresa eliminada exitosamente.');
        
    }

}