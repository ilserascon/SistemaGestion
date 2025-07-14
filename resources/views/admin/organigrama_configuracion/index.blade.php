@extends('layouts.stisla')

@section('title', 'Configuración de Campos del Organigrama')

@section('content')
<div class="section">
  <div class="section-header d-flex justify-content-between align-items-center">
    <h1>Configuración de Campos</h1>
    <a href="{{ route('admin.organigrama_configuracion.create') }}" class="btn btn-primary">+ Nuevo Campo</a>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="section-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nombre Campo</th>
          <th>Etiqueta</th>
          <th>Tipo de Dato</th>
          <th>Requerido</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($campos as $campo)
          <tr>
            <td>{{ $campo->nombre_campo }}</td>
            <td>{{ $campo->etiqueta }}</td>
            <td>{{ ucfirst($campo->tipo_dato) }}</td>
            <td>{{ $campo->requerido ? 'Sí' : 'No' }}</td>
            <td>{{ $campo->activo ? 'Sí' : 'No' }}</td>
            <td>
              <a href="{{ route('admin.organigrama_configuracion.edit', $campo) }}" class="btn btn-sm btn-warning">Editar</a>
              <form action="{{ route('admin.organigrama_configuracion.destroy', $campo) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar este campo?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Eliminar</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
