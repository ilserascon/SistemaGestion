{{-- filepath: c:\Users\ydiaz\OneDrive\Documentos\Estadias\SistemaGestion\resources\views\admin\procesos\index.blade.php --}}
@extends('layouts.stisla')

@section('title', 'Procesos')

@section('content')
<div class="section">
    <div class="section-header">
        <h1>Procesos</h1>
        <div class="section-header-button ml-auto">
            <a href="{{ route('admin.procesos.create') }}" class="btn btn-primary">Crear Nuevo Proceso</a>
        </div>
    </div>

    <div class="section-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Lista de Procesos</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Validado</th>
                            <th>Actividad</th>
                            <th>Responsable</th>
                            <th>Desarrollo</th>
                            <th>Fecha Entregable</th>
                            <th>Fecha Finalizado</th>
                            <th>Tipo</th>
                            <th>Liga</th>
                            <th>Mensaje</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($procesos as $proceso)
                            <tr>
                                <td>{{ $proceso->id }}</td>
                                <td>{{ $proceso->validado ? 'Sí' : 'No' }}</td>
                                <td class="text-truncate" style="max-width: 150px;">{{ $proceso->actividad }}</td>
                                <td class="text-truncate" style="max-width: 150px;">{{ $proceso->responsable }}</td>
                                <td class="text-truncate" style="max-width: 200px;">{{ $proceso->desarrollo }}</td>
                                <td>{{ $proceso->fecha_entregable ?? 'N/A' }}</td>
                                <td>{{ $proceso->fecha_finalizado ?? 'N/A' }}</td>
                                <td>{{ $proceso->tipo }}</td>
                                <td>
                                    @if ($proceso->liga)
                                        <a href="{{ $proceso->liga }}" target="_blank">Ver</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="text-truncate" style="max-width: 200px;">{{ $proceso->mensaje }}</td>
                                <td>
                                    <a href="{{ route('admin.procesos.show', $proceso->id) }}" class="btn btn-info btn-sm" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.procesos.edit', $proceso->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.procesos.destroy', $proceso->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar?')" title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center">No hay procesos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection