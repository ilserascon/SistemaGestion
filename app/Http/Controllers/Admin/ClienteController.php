<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Proceso;
use App\Models\ProcesosCliente;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $query = Cliente::where('borrado', 1);

        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        if ($request->filled('rfc')) {
            $query->where('rfc', 'like', '%' . $request->rfc . '%');
        }

        $clientes = $query->paginate(10);

        $clienteSeleccionado = session('cliente_seleccionado');

        return view('admin.clientes.index', compact('clientes', 'clienteSeleccionado'));
    }

    public function create()
    {
        return view('admin.clientes.create');
    }

    public function store(Request $request)
    {
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
        ],[
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'rfc.required' => 'El RFC es obligatorio.',
            'rfc.unique' => 'El RFC ya está registrado.',
            'rfc.max' => 'El RFC no debe exceder 13 caracteres.',
            'razon_social.required' => 'La razón social es obligatoria.',
            'direccion.required' => 'La dirección es obligatoria.',
            'colonia.required' => 'La colonia es obligatoria.',
            'numero_exterior.required' => 'El número exterior es obligatorio.',
            'codigo_postal.required' => 'El código postal es obligatorio.',
            'localidad.required' => 'La localidad es obligatoria.',
            'ciudad.required' => 'La ciudad es obligatoria.',
            'estado.required' => 'El estado es obligatorio.',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'El formato del correo electrónico es inválido.',
            'correo.unique' => 'El correo electrónico ya está registrado.',
            'telefono.max' => 'El teléfono no debe exceder 20 caracteres.',
            'celular.max' => 'El celular no debe exceder 20 caracteres.',
        ]);

        // Crear el cliente
        $cliente = Cliente::create($request->all());

        // Guardar el cliente como seleccionado en la sesión
        session(['cliente_seleccionado' => $cliente->id]);

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

    public function seleccionar($id)
    {
        $cliente = Cliente::findOrFail($id);
        session(['cliente_seleccionado' => $cliente->id]);
        return redirect()->route('admin.clientes.index')->with('success', "Cliente {$cliente->razon_social} seleccionado.");
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
        ],[
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'rfc.required' => 'El RFC es obligatorio.',
            'rfc.unique' => 'El RFC ya está registrado.',
            'rfc.max' => 'El RFC no debe exceder 13 caracteres.',
            'razon_social.required' => 'La razón social es obligatoria.',
            'direccion.required' => 'La dirección es obligatoria.',
            'colonia.required' => 'La colonia es obligatoria.',
            'numero_exterior.required' => 'El número exterior es obligatorio.',
            'codigo_postal.required' => 'El código postal es obligatorio.',
            'localidad.required' => 'La localidad es obligatoria.',
            'ciudad.required' => 'La ciudad es obligatoria.',
            'estado.required' => 'El estado es obligatorio.',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'El formato del correo electrónico es inválido.',
            'correo.unique' => 'El correo electrónico ya está registrado.',
            'telefono.max' => 'El teléfono no debe exceder 20 caracteres.',
            'celular.max' => 'El celular no debe exceder 20 caracteres.',
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

    public function deseleccionar()
    {
        session()->forget('cliente_seleccionado');

        return redirect()->route('admin.clientes.index')->with('info', 'Cliente deseleccionado.');
    }
  
    public function procesosCliente($clienteId)
    {
        $cliente = Cliente::findOrFail($clienteId);
        $procesos = $cliente->procesos; // Si tienes la relación definida en el modelo Cliente
     
        return view('admin.procesos_cliente.index', compact('procesos', 'cliente'));
    }

    public function showProcesosCliente($clienteId)
    {
        $cliente = Cliente::findOrFail($clienteId);
        session(['cliente_seleccionado' => $cliente->id]); // <-- Esto es lo importante
        $procesos = $cliente->procesosCliente;
        return view('admin.procesos_cliente.show', compact('procesos', 'cliente'));
    }
}
