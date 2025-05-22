<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProcesosCliente; // Modelo correcto
use App\Models\Cliente;
use App\Models\Proceso;
use Illuminate\Http\Request;

class ProcesosClienteController extends Controller
{
    /**
     * Display a listing of the resource for a specific client.
     */
    public function index()
    {
        $clientes = Cliente::all(); // Obtén todos los clientes
        return view('admin.procesos_cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());

        // Asignar todos los procesos al cliente
        $procesos = Proceso::all();
        foreach ($procesos as $proceso) {
            ProcesosCliente::create([
                'cliente_id' => $cliente->id,
                'proceso_id' => $proceso->id,
            ]);
        }

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente creado y procesos asignados.');
    }

    /**
     * Display the specified resource.
     */
    public function show($clienteId)
    {
        $cliente = Cliente::findOrFail($clienteId); // Busca el cliente por ID
        $procesos = ProcesosCliente::where('cliente_id', $clienteId)->with('proceso')->get(); // Procesos del cliente

        return view('admin.procesos_cliente.show', compact('cliente', 'procesos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProcesosCliente $procesosCliente)
{
    // Actualiza el estado de validado
    $procesosCliente->update([
        'validado' => $request->has('validado'), // Si el checkbox está marcado, será true
    ]);

    return back()->with('success', 'Estado del proceso actualizado correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($clienteId, ProcesosCliente $procesosCliente)
    {
        // Verifica que el proceso pertenece al cliente
        if ($procesosCliente->cliente_id != $clienteId) {
            return redirect()->back()->with('error', 'El proceso no pertenece al cliente especificado.');
        }

        $procesosCliente->delete();

        return back()->with('success', 'Proceso eliminado correctamente.');
    }

    /**
     * List all clients.
     */
    public function listClientes()
    {
        // Obtén el primer cliente o redirige si no hay clientes
        $cliente = Cliente::first();

        if (!$cliente) {
            return redirect()->route('admin.clientes.index')->with('error', 'No hay clientes disponibles.');
        }

        // Redirige al listado de procesos del cliente
        return redirect()->route('admin.procesos_cliente.index', ['clienteId' => $cliente->id]);
    }

    /**
     * Assign all processes to all clients.
     */
    public function assignProcessesToClients()
    {
        $clientes = Cliente::all();
        $procesos = Proceso::all();

        foreach ($clientes as $cliente) {
            foreach ($procesos as $proceso) {
                ProcesosCliente::firstOrCreate([
                    'cliente_id' => $cliente->id,
                    'proceso_id' => $proceso->id,
                ], [
                    'validado' => false,
                ]);
            }
        }
    }
}
