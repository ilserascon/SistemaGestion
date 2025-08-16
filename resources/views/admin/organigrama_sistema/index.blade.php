@extends('layouts.stisla')

@section('title', 'Organigrama Sistema')

@section('content')
<div class="section">
    <div class="section-header d-flex justify-content-between align-items-center">
        <h1>Organigrama Sistema</h1>
        <a href="{{ route('admin.organigrama_sistema.create') }}" class="btn btn-primary btn-sm">+ Agregar Personal</a>
    </div>

    <div class="section-body">
        @if($personal->count())
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Puesto</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                @foreach ($campos as $campo)
                                    <th>{{ $campo->etiqueta }}</th>
                                @endforeach
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personal as $persona)
                                <tr>
                                    <td>{{ $persona->nombre }}</td>
                                    <td>{{ $persona->puesto }}</td>
                                    <td>{{ $persona->telefono }}</td>
                                    <td>{{ $persona->correo }}</td>
                                    @foreach ($campos as $campo)
                                        <td>{{ $persona->valores->firstWhere('campo_id', $campo->id)->valor ?? '' }}</td>
                                    @endforeach
                                    <td>
                                        <a href="{{ route('admin.organigrama_sistema.edit', $persona->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('admin.organigrama_sistema.destroy', $persona->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar personal?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <p class="text-muted">No hay personal registrado.</p>
        @endif
    </div>
</div>
@endsection
