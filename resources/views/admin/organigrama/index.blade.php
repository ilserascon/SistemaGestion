@extends('layouts.stisla')

@section('title', isset($empresa) ? 'Organigrama - ' . $empresa->nombre : 'Organigrama')

@section('content')
<div class="section">
  <div class="section-header d-flex justify-content-between align-items-center">
    <h1>Organigrama</h1>

    @if(!empty($clienteSeleccionado))
      @if(!empty($empresas) && $empresas->count())
        <form method="GET" id="formEmpresa" class="form-inline">
          <label for="empresa_select" class="mr-2 font-weight-bold">Seleccionar Empresa:</label>
          <select name="empresa_select" id="empresa_select" class="form-control form-control-sm mr-2"
            style="min-width: 220px;"
            onchange="document.getElementById('formEmpresa').action = '{{ url('admin/organigrama') }}/' + this.value; this.form.submit();">
            <option value="">-- Seleccione --</option>
            @foreach($empresas as $emp)
              <option value="{{ $emp->id }}" {{ (isset($empresa) && $empresa->id == $emp->id) ? 'selected' : '' }}>
                {{ $emp->nombre }}
              </option>
            @endforeach
          </select>
        </form>
      @else
        <p class="text-danger font-weight-bold">Este cliente no tiene empresas</p>
      @endif
    @else
      <p class="text-info font-weight-bold">Selecciona un cliente con empresas para ver su organigrama</p>
    @endif
  </div>

  @if(isset($empresa))
  <div class="card shadow-sm mb-2" style="padding-top: 0.3rem; padding-bottom: 0.3rem;">
    <div class="card-body" style="padding: 0.5rem 1rem;">
      <h5 class="font-weight-bold mb-0" style="font-size: 1.25rem; color: #34395e;">
        {{ $empresa->nombre }}
      </h5>
    </div>
  </div>
  @endif

  <div class="section-body">
    @if(!empty($personal) && $personal->count())
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4>Personal</h4>
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarPersonal">
            + Agregar Personal
          </button>
        </div>
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
                    <td>{{ $persona->valores[$campo->etiqueta] ?? '' }}</td>
                  @endforeach
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @elseif(isset($empresa))
      <div class="text-center mt-4">
        <p class="text-muted">No hay personal registrado para esta empresa.</p>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarPersonal">
          + Agregar Personal
        </button>
      </div>
    @endif
  </div>
</div>

<!-- Modal Agregar Personal -->
@if(isset($empresa))
<div class="modal fade" id="modalAgregarPersonal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('admin.organigrama.store') }}" method="POST">
      @csrf
      <input type="hidden" name="empresa_id" value="{{ $empresa->id }}">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Agregar Personal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Puesto</label>
            <input type="text" name="puesto" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control">
          </div>
          <div class="form-group">
            <label>Correo</label>
            <input type="email" name="correo" class="form-control">
          </div>

          @foreach($campos as $campo)
            <div class="form-group">
              <label>{{ $campo->etiqueta }}</label>

              @php
                $name = "campos[" . $campo->nombre_campo . "]";
                $required = $campo->requerido ? 'required' : '';
              @endphp

              @if($campo->tipo_dato === 'texto')
                <input type="text" name="{{ $name }}" class="form-control" {{ $required }}>
              @elseif($campo->tipo_dato === 'numero')
                <input type="number" name="{{ $name }}" class="form-control" {{ $required }}>
              @elseif($campo->tipo_dato === 'fecha')
                <input type="date" name="{{ $name }}" class="form-control" {{ $required }}>
              @elseif($campo->tipo_dato === 'booleano')
                <select name="{{ $name }}" class="form-control" {{ $required }}>
                  <option value="">-- Seleccione --</option>
                  <option value="1">Sí</option>
                  <option value="0">No</option>
                </select>
              @endif
            </div>
          @endforeach
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endif

@endsection
