{{-- filepath: resources/views/admin/procesos_cliente/index.blade.php --}}
@extends('layouts.stisla')

@section('title', 'Clientes')

@section('content')
<div class="section">
    <div class="section-header">
        <h1>Clientes</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Lista de Clientes</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>RFC</th>                            
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->apellido }}</td>
                                <td>{{ $cliente->rfc }}</td>
                                <td>
                                    <a href="{{ route('admin.procesos_cliente.show', $cliente->id) }}" class="btn btn-primary btn-sm">
                                        Ver Procesos
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No hay clientes registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
