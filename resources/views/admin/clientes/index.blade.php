@extends('layouts.stisla')

@section('title', 'Listado de Clientes')

@section('content')
<div class="section">
  <div class="section-header">
    <h1>Listado de Clientes</h1>
    <div class="section-header-button ml-auto">
      <a href="{{ route('admin.clientes.create') }}" class="btn btn-primary">Nuevo Cliente</a>
    </div>
  </div>

  <div class="section-body">
    <div class="card">
      <div class="card-header">
        <h4>Filtros</h4>
      </div>
      <div class="card-body">
        <!-- Formulario de filtros -->
        <form method="GET" action="{{ route('admin.clientes.index') }}">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="nombre">Nombre</label>
              <input type="text" id="nombre" name="nombre" class="form-control" value="{{ request('nombre') }}" placeholder="Buscar por nombre">
            </div>
            <div class="form-group col-md-4">
              <label for="rfc">RFC</label>
              <input type="text" id="rfc" name="rfc" class="form-control" value="{{ request('rfc') }}" placeholder="Buscar por RFC">
            </div>
            <div class="form-group col-md-4 align-self-end">
              <button type="submit" class="btn btn-primary">Filtrar</button>
              <a href="{{ route('admin.clientes.index') }}" class="btn btn-secondary">Limpiar</a>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4>Clientes</h4>
      </div>
      <div class="card-body table-responsive">
        <!-- Tabla de clientes -->
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
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
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($clientes as $cliente)
              <tr>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->apellido }}</td>
                <td>{{ $cliente->rfc }}</td>
                <td>{{ $cliente->razon_social }}</td>
                <td>{{ $cliente->direccion }}</td>
                <td>{{ $cliente->colonia }}</td>
                <td>{{ $cliente->numero_interior }}</td>
                <td>{{ $cliente->numero_exterior }}</td>
                <td>{{ $cliente->codigo_postal }}</td>
                <td>{{ $cliente->localidad }}</td>
                <td>{{ $cliente->ciudad }}</td>
                <td>{{ $cliente->estado }}</td>
                <td>{{ $cliente->correo }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>{{ $cliente->celular }}</td>
                <td>
                  <div class="d-flex align-items-center">
                    <a href="{{ route('admin.clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm mr-2">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('¿Eliminar cliente?')" class="mr-2">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                    @if ($clienteSeleccionado == $cliente->id)
                      <a class="btn btn-secondary btn-sm text-dark disabled">Seleccionado</a>
                    @else
                      <a href="{{ route('admin.procesos_cliente.show', $cliente->id) }}" class="btn btn-success btn-sm">
                        Seleccionar
                      </a>
                    @endif
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="16" class="text-center">No se encontraron clientes.</td>
              </tr>
            @endforelse
          </tbody>
        </table>

        <!-- Paginación -->
        {{ $clientes->links() }}
      </div>
    </div>
  </div>
</div>
@endsection