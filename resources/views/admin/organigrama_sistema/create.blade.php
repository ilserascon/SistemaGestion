@extends('layouts.stisla')

@section('title', 'Agregar Personal')

@section('content')
<div class="section">
    <div class="section-header">
        <h1>Agregar Personal</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.organigrama_sistema.store') }}" method="POST">
                    @csrf
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

                    @foreach ($campos as $campo)
                        @php
                            $name = "campos[".$campo->id."]";
                            $required = $campo->requerido ? 'required' : '';
                        @endphp
                        <div class="form-group">
                            <label>{{ $campo->etiqueta }}</label>
                            @if($campo->tipo_dato == 'texto')
                                <input type="text" name="{{ $name }}" class="form-control" {{ $required }}>
                            @elseif($campo->tipo_dato == 'numero')
                                <input type="number" name="{{ $name }}" class="form-control" {{ $required }}>
                            @elseif($campo->tipo_dato == 'fecha')
                                <input type="date" name="{{ $name }}" class="form-control" {{ $required }}>
                            @elseif($campo->tipo_dato == 'booleano')
                                <select name="{{ $name }}" class="form-control" {{ $required }}>
                                    <option value="">--Seleccione--</option>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            @endif
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('admin.organigrama_sistema.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
