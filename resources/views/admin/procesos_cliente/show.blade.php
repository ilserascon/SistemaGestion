{{-- filepath: resources/views/admin/procesos_cliente/show.blade.php --}}
@extends('layouts.stisla')

@section('title', 'Procesos del Cliente')

@section('content')
<div class="section">
    <div class="section-header">
        <h1>Procesos de {{ $cliente->razon_social }}</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Lista de Procesos</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Actividad</th>
                            <th>Responsable</th>
                            <th>Validado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($procesos as $procesosCliente)
                            <tr>
                                <td>{{ $procesosCliente->proceso->id }}</td>
                                <td>{{ $procesosCliente->proceso->actividad }}</td>
                                <td>{{ $procesosCliente->proceso->responsable }}</td>
                                <td>
                                    <form action="{{ route('admin.procesos_cliente.update', $procesosCliente->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="checkbox" name="validado" {{ $procesosCliente->validado ? 'checked' : '' }} onchange="this.form.submit()">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No hay procesos asignados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection