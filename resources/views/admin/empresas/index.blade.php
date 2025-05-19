@extends('layouts.stisla')

@section('title', 'Empresas')

@section('content')
<div class="section">
  <div class="section-header">
    <h1>Empresas</h1>
    <div class="section-header-button ml-auto">
      <a href="{{ route('admin.empresas.create') }}" class="btn btn-primary">Nueva Empresa</a>
    </div>
  </div>

  <div class="section-body">
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
      <div class="card-header">
        <h4>Lista de Empresas</h4>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
            <th>Cliente</th>
            <th>RFC</th>
            <th>Razón Social</th>
            <th>Dirección</th>
            <th>Colonia</th>
            <th>Número Interior</th>
            <th>Número Exterior</th>
            <th>Código Postal</th>
            <th>Localidad</th>
            <th>Ciudad</th>
            <th>Estado</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Celular</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($empresas as $empresa)
              <tr>
              <td>{{ $empresa->cliente_id }}</td>
              <td>{{ $empresa->rfc }}</td>
              <td>{{ $empresa->razon_social }}</td>
              <td>{{ $empresa->direccion }}</td>
              <td>{{ $empresa->colonia }}</td>
              <td>{{ $empresa->numero_interior }}</td>
              <td>{{ $empresa->numero_exterior }}</td>
              <td>{{ $empresa->codigo_postal }}</td>
              <td>{{ $empresa->localidad }}</td>
              <td>{{ $empresa->ciudad }}</td>
              <td>{{ $empresa->estado }}</td>
              <td>{{ $empresa->correo }}</td>
              <td>{{ $empresa->telefono }}</td>
              <td>{{ $empresa->celular }}</td>
                <td>
                  <a href="{{ route('admin.empresas.edit', $empresa->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                  <form action="{{ route('admin.empresas.destroy', $empresa->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar empresa?')"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
            @empty
              <tr><td colspan="6" class="text-center">No hay empresas registradas.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
