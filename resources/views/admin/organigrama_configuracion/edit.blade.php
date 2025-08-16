@extends('layouts.stisla')

@section('title', 'Editar Campo de Configuración')

@section('content')
<div class="section">
  <h1>Editar Campo</h1>

  <form method="POST" action="{{ route('admin.organigrama_configuracion.update', $organigramaConfiguracion) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label>Nombre del campo (sin espacios)</label>
      <input type="text" name="nombre_campo" class="form-control" required value="{{ old('nombre_campo', $organigramaConfiguracion->nombre_campo) }}">
      @error('nombre_campo')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="form-group">
      <label>Etiqueta</label>
      <input type="text" name="etiqueta" class="form-control" value="{{ old('etiqueta', $organigramaConfiguracion->etiqueta) }}">
      @error('etiqueta')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="form-group">
      <label>Tipo de dato</label>
      <select name="tipo_dato" class="form-control" required>
        <option value="">-- Seleccione --</option>
        <option value="texto" {{ (old('tipo_dato', $organigramaConfiguracion->tipo_dato) == 'texto') ? 'selected' : '' }}>Texto</option>
        <option value="numero" {{ (old('tipo_dato', $organigramaConfiguracion->tipo_dato) == 'numero') ? 'selected' : '' }}>Número</option>
        <option value="fecha" {{ (old('tipo_dato', $organigramaConfiguracion->tipo_dato) == 'fecha') ? 'selected' : '' }}>Fecha</option>
        <option value="booleano" {{ (old('tipo_dato', $organigramaConfiguracion->tipo_dato) == 'booleano') ? 'selected' : '' }}>Booleano</option>
      </select>
      @error('tipo_dato')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="form-check">
      <input type="checkbox" name="requerido" class="form-check-input" id="requerido" {{ old('requerido', $organigramaConfiguracion->requerido) ? 'checked' : '' }}>
      <label for="requerido" class="form-check-label">Requerido</label>
    </div>

    <div class="form-check">
      <input type="checkbox" name="activo" class="form-check-input" id="activo" {{ old('activo', $organigramaConfiguracion->activo) ? 'checked' : '' }}>
      <label for="activo" class="form-check-label">Activo</label>
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('admin.organigrama_configuracion.index') }}" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
@endsection
