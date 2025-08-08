<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Organigrama;
use App\Models\Cliente;
use App\Models\OrganigramaConfiguracion;
use App\Models\OrganigramaValor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 


class OrganigramaController extends Controller
{
    public function index(Request $request, $empresa_id = null)
    {
        $clienteId = session('cliente_seleccionado'); // ID guardado en sesión
        $clienteSeleccionado = null;
        $empresas = collect();
        $empresa = null;
        $personal = collect();
        $campos = collect();

        if ($clienteId) {
            $clienteSeleccionado = Cliente::find($clienteId);

            if ($clienteSeleccionado) {
                $empresas = Empresa::where('cliente_id', $clienteSeleccionado->id)->get();

                // Determinar ID de empresa desde select o parámetro
                $empresaSeleccionadaId = $request->get('empresa_select') ?? $empresa_id;

                if ($empresaSeleccionadaId) {
                    $empresa = Empresa::find($empresaSeleccionadaId);

                    if ($empresa) {
                            $campos = OrganigramaConfiguracion::where('activo', true)->get();

                            $personal = Organigrama::where('empresa_id', $empresa->id)
                                ->with(['valores' => function ($query) use ($campos) {
                                    $query->whereIn('campo_id', $campos->pluck('id'));
                                }])
                                ->get();

                            $personal->each(function ($persona) use ($campos) {
                                $persona->valores = $campos->mapWithKeys(function ($campo) use ($persona) {
                                    $valor = $persona->valores->firstWhere('campo_id', $campo->id);
                                    return [$campo->etiqueta => $valor ? $valor->valor : null];
                                });
                            });
                    }
                }
            }
        }

        return view('admin.organigrama.index', compact('clienteSeleccionado', 'empresas', 'empresa', 'personal', 'campos'));
    }

    public function store(Request $request)
    {
        $persona = new Organigrama();
        $persona->empresa_id = $request->empresa_id;
        $persona->nombre = $request->nombre;
        $persona->puesto = $request->puesto;
        $persona->telefono = $request->telefono;
        $persona->correo = $request->correo;
        $persona->save();

        foreach ($request->campos ?? [] as $clave => $valor) {
            // Buscar el campo por nombre_campo
            $campo = OrganigramaConfiguracion::where('nombre_campo', $clave)->first();
            if ($campo) {
                OrganigramaValor::create([
                    'personal_id' => $persona->id,
                    'campo_id' => $campo->id,
                    'valor' => $valor,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Personal agregado correctamente.');
    }


}
