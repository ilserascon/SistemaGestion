@extends('layouts.stisla')

@section('title', 'Editar Empresa')

@section('content')
<div class="section">
  <div class="section-header">
    <h1>Editar Empresa</h1>
  </div>

  <div class="section-body">
    <div class="card">
      <div class="card-body">
        <form method="POST" action="{{ route('admin.empresas.update', $empresa->id) }}">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <input type="text" name="cliente_id" class="form-control @error('cliente_id') is-invalid @enderror"
                   value="{{ old('cliente_id', $empresa->cliente_id) }}" required>
            @error('cliente_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="rfc">RFC</label>
            <input name="rfc" class="form-control @error('rfc') is-invalid @enderror"
                   value="{{ old('rfc', $empresa->rfc) }}" required>
            @error('rfc') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="razon_social">Razón Social</label>
            <input name="razon_social" class="form-control @error('razon_social') is-invalid @enderror"
                   value="{{ old('razon_social', $empresa->razon_social) }}" required>
            @error('razon_social') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="direccion">Dirección</label>
            <input name="direccion" class="form-control @error('direccion') is-invalid @enderror"
                   value="{{ old('direccion', $empresa->direccion) }}" required>
            @error('direccion') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="colonia">Colonia</label>
            <input name="colonia" class="form-control @error('colonia') is-invalid @enderror"
                   value="{{ old('colonia', $empresa->colonia) }}" required>
            @error('colonia') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="numero_exterior">Número Exterior</label>
              <input name="numero_exterior" class="form-control @error('numero_exterior') is-invalid @enderror"
                     value="{{ old('numero_exterior', $empresa->numero_exterior) }}" required>
              @error('numero_exterior') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="numero_interior">Número Interior</label>
              <input name="numero_interior" class="form-control @error('numero_interior') is-invalid @enderror"
                     value="{{ old('numero_interior', $empresa->numero_interior) }}">
              @error('numero_interior') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="codigo_postal">Código Postal</label>
            <input name="codigo_postal" class="form-control @error('codigo_postal') is-invalid @enderror"
                   value="{{ old('codigo_postal', $empresa->codigo_postal) }}" required>
            @error('codigo_postal') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="localidad">Localidad</label>
            <input name="localidad" class="form-control @error('localidad') is-invalid @enderror"
                   value="{{ old('localidad', $empresa->localidad) }}" required>
            @error('localidad') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <input name="ciudad" class="form-control @error('ciudad') is-invalid @enderror"
                   value="{{ old('ciudad', $empresa->ciudad) }}" required>
            @error('ciudad') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="estado">Estado</label>
            <input name="estado" class="form-control @error('estado') is-invalid @enderror"
                   value="{{ old('estado', $empresa->estado) }}" required>
            @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror"
                   value="{{ old('correo', $empresa->correo) }}" required>
            @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="telefono">Teléfono</label>
              <input name="telefono" class="form-control @error('telefono') is-invalid @enderror"
                     value="{{ old('telefono', $empresa->telefono) }}">
              @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="celular">Celular</label>
              <input name="celular" class="form-control @error('celular') is-invalid @enderror"
                     value="{{ old('celular', $empresa->celular) }}">
              @error('celular') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Actualizar</button>
          <a href="{{ route('admin.empresas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
