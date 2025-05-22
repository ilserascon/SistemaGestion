@extends('layouts.stisla')

@section('title', 'Editar Cliente')

@section('content')
<div class="section">
  <div class="section-header">
    <h1>Editar Cliente</h1>
  </div>

  <div class="section-body">
    <div class="card">
      <div class="card-body">
        <!-- El formulario para actualizar el cliente -->
        <form method="POST" action="{{ route('admin.clientes.update', $cliente->id) }}">
          @csrf
          @method('PUT') <!-- Necesario para realizar la actualización -->

          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                    value="{{ old('nombre', $cliente->nombre) }}" required>
            @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="apellido">Apellido</label>
            <input id="apellido" name="apellido" class="form-control @error('apellido') is-invalid @enderror"
                   value="{{ old('apellido', $cliente->apellido) }}" required>
            @error('apellido') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="rfc">RFC</label>
            <input id="rfc" name="rfc" class="form-control @error('rfc') is-invalid @enderror"
                   value="{{ old('rfc', $cliente->rfc) }}" required>
            @error('rfc') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="razon_social">Razón Social</label>
            <input id="razon_social" name="razon_social" class="form-control @error('razon_social') is-invalid @enderror"
                   value="{{ old('razon_social', $cliente->razon_social) }}" required>
            @error('razon_social') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="direccion">Dirección</label>
            <input id="direccion" name="direccion" class="form-control @error('direccion') is-invalid @enderror"
                   value="{{ old('direccion', $cliente->direccion) }}" required>
            @error('direccion') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="colonia">Colonia</label>
            <input id="colonia" name="colonia" class="form-control @error('colonia') is-invalid @enderror"
                   value="{{ old('colonia', $cliente->colonia) }}">
            @error('colonia') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="numero_interior">Número Interior</label>
            <input id="numero_interior" name="numero_interior" class="form-control @error('numero_interior') is-invalid @enderror"
                   value="{{ old('numero_interior', $cliente->numero_interior) }}">
            @error('numero_interior') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="numero_exterior">Número Exterior</label>
            <input id="numero_exterior" name="numero_exterior" class="form-control @error('numero_exterior') is-invalid @enderror"
                   value="{{ old('numero_exterior', $cliente->numero_exterior) }}">
            @error('numero_exterior') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="codigo_postal">Código Postal</label>
            <input id="codigo_postal" name="codigo_postal" class="form-control @error('codigo_postal') is-invalid @enderror"
                   value="{{ old('codigo_postal', $cliente->codigo_postal) }}">
            @error('codigo_postal') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="localidad">Localidad</label>
            <input id="localidad" name="localidad" class="form-control @error('localidad') is-invalid @enderror"
                   value="{{ old('localidad', $cliente->localidad) }}">
            @error('localidad') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <input id="ciudad" name="ciudad" class="form-control @error('ciudad') is-invalid @enderror"
                   value="{{ old('ciudad', $cliente->ciudad) }}">
            @error('ciudad') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="estado">Estado</label>
            <input id="estado" name="estado" class="form-control @error('estado') is-invalid @enderror"
                   value="{{ old('estado', $cliente->estado) }}">
            @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="correo">Correo Electrónico</label>
            <input id="correo" type="email" name="correo" class="form-control @error('correo') is-invalid @enderror"
                   value="{{ old('correo', $cliente->correo) }}" required>
            @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input id="telefono" name="telefono" class="form-control @error('telefono') is-invalid @enderror"
                   value="{{ old('telefono', $cliente->telefono) }}">
            @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group">
            <label for="celular">Celular</label>
            <input id="celular" name="celular" class="form-control @error('celular') is-invalid @enderror"
                   value="{{ old('celular', $cliente->celular) }}">
            @error('celular') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <button type="submit" class="btn btn-primary">Actualizar</button>
          <a href="{{ route('admin.clientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
