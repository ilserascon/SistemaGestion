@extends('layouts.stisla')

@section('title', 'Editar Personal')

@section('content')
<div class="section">
    <div class="section-header">
        <h1>Editar Personal</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.organigrama_sistema.update', $personal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $personal->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label>Puesto</label>
                        <input type="text" name="puesto" class="form-control" value="{{ $personal->puesto }}" required>
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="{{ $personal->telefono }}">
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="correo" class="form-control" value="{{ $personal->correo }}">
                    </div>

                    @foreach ($campos as $campo)
                        @php
                            $valor = $personal->valores->firstWhere('campo_id', $campo->id)->valor ?? '';
                            $name = "campos[".$campo->id."]";
                            $required = $campo->requerido ? 'required' : '';
                        @endphp
                        <div class="form-group">
                            <label>{{ $campo->etiqueta }}</label>
                            @if($campo->tipo_dato == 'texto')
                                <input type="text" name="{{ $name }}" class="form-control" value="{{ $valor }}" {{ $required }}>
                            @elseif($campo->tipo_dato == 'numero')
                                <input type="number" name="{{ $name }}" class="form-control" value="{{ $valor }}" {{ $required }}>
                            @elseif($campo->tipo_dato == 'fecha')
                                <input type="date" name="{{ $name }}" class="form-control" value="{{ $valor }}" {{ $required }}>
                            @elseif($campo->tipo_dato == 'booleano')
                                <select name="{{ $name }}" class="form-control" {{ $required }}>
                                    <option value="">--Seleccione--</option>
                                    <option value="1" @if($valor=='1') selected @endif>Sí</option>
                                    <option value="0" @if($valor=='0') selected @endif>No</option>
                                </select>
                            @endif
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('admin.organigrama_sistema.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
