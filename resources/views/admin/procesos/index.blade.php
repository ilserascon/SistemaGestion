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
                                <td>{{ $proceso->actividad }}</td>
                                <td class="text-truncate" style="max-width: 150px;">{{ $proceso->responsable }}</td>
                                <td>{{ $proceso->desarrollo }}</td>
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
                                    <a href="#" 
                                       class="btn btn-info btn-sm" 
                                       title="Ver"
                                       data-toggle="modal"
                                       data-target="#procesoModal"
                                       data-id="{{ $proceso->id }}"
                                       data-actividad="{{ $proceso->actividad }}"
                                       data-responsable="{{ $proceso->responsable }}"
                                       data-desarrollo="{{ $proceso->desarrollo }}"
                                       data-fecha_entregable="{{ $proceso->fecha_entregable }}"
                                       data-fecha_finalizado="{{ $proceso->fecha_finalizado }}"
                                       data-tipo="{{ $proceso->tipo }}"
                                       data-liga="{{ $proceso->liga }}"
                                       data-mensaje="{{ $proceso->mensaje }}"
                                       data-validado="{{ $proceso->validado ? 'Sí' : 'No' }}"
                                       onclick="showProcesoModal(this)">
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

<!-- Modal-->
<div class="modal fade" id="procesoModal" tabindex="-1" role="dialog" aria-labelledby="procesoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="procesoModalLabel">Detalles del Proceso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <dl class="row">
          <dt class="col-sm-3">ID</dt>
          <dd class="col-sm-9" id="modal-proceso-id"></dd>
          <dt class="col-sm-3">Validado</dt>
          <dd class="col-sm-9" id="modal-proceso-validado"></dd>
          <dt class="col-sm-3">Actividad</dt>
          <dd class="col-sm-9" id="modal-proceso-actividad"></dd>
          <dt class="col-sm-3">Responsable</dt>
          <dd class="col-sm-9" id="modal-proceso-responsable"></dd>
          <dt class="col-sm-3">Desarrollo</dt>
          <dd class="col-sm-9" id="modal-proceso-desarrollo"></dd>
          <dt class="col-sm-3">Fecha Entregable</dt>
          <dd class="col-sm-9" id="modal-proceso-fecha-entregable"></dd>
          <dt class="col-sm-3">Fecha Finalizado</dt>
          <dd class="col-sm-9" id="modal-proceso-fecha-finalizado"></dd>
          <dt class="col-sm-3">Tipo</dt>
          <dd class="col-sm-9" id="modal-proceso-tipo"></dd>
          <dt class="col-sm-3">Liga</dt>
          <dd class="col-sm-9" id="modal-proceso-liga"></dd>
          <dt class="col-sm-3">Mensaje</dt>
          <dd class="col-sm-9" id="modal-proceso-mensaje"></dd>
        </dl>
      </div>
    </div>
  </div>
</div>

<script>
function showProcesoModal(element) {
    document.getElementById('modal-proceso-id').innerText = element.getAttribute('data-id');
    document.getElementById('modal-proceso-validado').innerText = element.getAttribute('data-validado');
    document.getElementById('modal-proceso-actividad').innerText = element.getAttribute('data-actividad');
    document.getElementById('modal-proceso-responsable').innerText = element.getAttribute('data-responsable');
    document.getElementById('modal-proceso-desarrollo').innerText = element.getAttribute('data-desarrollo');
    document.getElementById('modal-proceso-fecha-entregable').innerText = element.getAttribute('data-fecha_entregable');
    document.getElementById('modal-proceso-fecha-finalizado').innerText = element.getAttribute('data-fecha_finalizado');
    document.getElementById('modal-proceso-tipo').innerText = element.getAttribute('data-tipo');
    let liga = element.getAttribute('data-liga');
    document.getElementById('modal-proceso-liga').innerHTML = liga ? `<a href="${liga}" target="_blank">Ver</a>` : 'N/A';
    document.getElementById('modal-proceso-mensaje').innerText = element.getAttribute('data-mensaje');
}
</script>
@endsection