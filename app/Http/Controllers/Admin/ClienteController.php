<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente; // Asegúrate de tener el modelo Cliente
use App\Models\Proceso;
use App\Models\ProcesosCliente;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $query = Cliente::where('borrado', 1);

        // Filtro por nombre
        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        // Filtro por RFC
        if ($request->filled('rfc')) {
            $query->where('rfc', 'like', '%' . $request->rfc . '%');
        }

        // Obtener los clientes paginados
        $clientes = $query->paginate(10);

        return view('admin.clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('admin.clientes.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del cliente
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'rfc' => 'required|string|max:13|unique:clientes',
            'razon_social' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'colonia' => 'required|string|max:255',
            'numero_interior' => 'nullable|string|max:50',
            'numero_exterior' => 'required|string|max:50',
            'codigo_postal' => 'required|string|max:10',
            'localidad' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes',
            'telefono' => 'nullable|string|max:20',
            'celular' => 'nullable|string|max:20',
        ]);

        // Crear el cliente
        $cliente = Cliente::create($request->all());

        // Asignar todos los procesos al cliente
        $procesos = Proceso::all(); // Obtener todos los procesos de la tabla procesos
        foreach ($procesos as $proceso) {
            ProcesosCliente::create([
                'cliente_id' => $cliente->id,
                'proceso_id' => $proceso->id,
                'validado' => false, // Por defecto, los procesos no están validados
            ]);
        }

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente creado y procesos asignados automáticamente.');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('admin.clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('admin.clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',	
            'apellido' => 'required|string|max:255',
            'rfc' => 'required|string|max:13|unique:clientes,rfc,' . $cliente->id,
            'razon_social' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'colonia' => 'required|string|max:255',
            'numero_interior' => 'nullable|string|max:50',
            'numero_exterior' => 'required|string|max:50',
            'codigo_postal' => 'required|string|max:10',
            'localidad' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,correo,' . $cliente->id,
            'telefono' => 'nullable|string|max:20',
            'celular' => 'nullable|string|max:20',
        ]);

        $cliente->update($request->all());

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->borrado = 0;
        $cliente->save();

        return redirect()->route('admin.clientes.index')->with('danger', 'Cliente eliminado exitosamente.');
    }
}