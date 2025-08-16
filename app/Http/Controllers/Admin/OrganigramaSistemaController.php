<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrganigramaSistema;
use App\Models\OrganigramaConfiguracion;
use App\Models\OrganigramaValores;

class OrganigramaSistemaController extends Controller
{
    public function index()
    {
        $personal = OrganigramaSistema::with('valores')->get();
        $campos = OrganigramaConfiguracion::where('activo',1)->get();
        return view('admin.organigrama_sistema.index', compact('personal','campos'));
    }

    public function create()
    {
        $campos = OrganigramaConfiguracion::where('activo',1)->get();
        return view('admin.organigrama_sistema.create', compact('campos'));
    }

    public function store(Request $request)
    {
        $personal = OrganigramaSistema::create($request->only(['nombre','puesto','telefono','correo']));

        if($request->campos){
            foreach($request->campos as $campo_id => $valor){
                OrganigramaValores::create([
                    'personal_id' => $personal->id,
                    'campo_id' => $campo_id,
                    'valor' => $valor
                ]);
            }
        }

        return redirect()->route('admin.organigrama_sistema.index')->with('success','Personal agregado');
    }

    public function edit($id)
    {
        $personal = OrganigramaSistema::with('valores')->findOrFail($id);
        $campos = OrganigramaConfiguracion::where('activo',1)->get();
        return view('admin.organigrama_sistema.edit', compact('personal','campos'));
    }

    public function update(Request $request, $id)
    {
        $personal = OrganigramaSistema::findOrFail($id);
        $personal->update($request->only(['nombre','puesto','telefono','correo']));

        if($request->campos){
            foreach($request->campos as $campo_id => $valor){
                OrganigramaValores::updateOrCreate(
                    ['personal_id' => $personal->id, 'campo_id' => $campo_id],
                    ['valor' => $valor]
                );
            }
        }

        return redirect()->route('admin.organigrama_sistema.index')->with('success','Personal actualizado');
    }

    public function destroy($id)
    {
        $personal = OrganigramaSistema::findOrFail($id);
        $personal->delete();
        return redirect()->route('admin.organigrama_sistema.index')->with('success','Personal eliminado');
    }
}
