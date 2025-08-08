@extends('layouts.stisla')

@section('title', 'Nueva Empresa')

@section('content')
<div class="section">
  <div class="section-header">
    <h1>Nueva Empresa</h1>
  </div>

  <div class="section-body">
    <div class="card">
      <div class="card-body">
        <form method="POST" action="{{ route('admin.empresas.store') }}">
          @csrf

          {{-- Fila 1: Nombre - RFC - Razón Social --}}
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
              @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="rfc">RFC</label>
              <input type="text" name="rfc" class="form-control @error('rfc') is-invalid @enderror" value="{{ old('rfc') }}" required>
              @error('rfc') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="razon_social">Razón Social</label>
              <input type="text" name="razon_social" class="form-control @error('razon_social') is-invalid @enderror" value="{{ old('razon_social') }}" required>
              @error('razon_social') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>

          {{-- Fila 2: Dirección - Colonia - NE - NI - Código Postal --}}
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="direccion">Dirección</label>
              <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion') }}" required>
              @error('direccion') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-3">
              <label for="colonia">Colonia</label>
              <input type="text" name="colonia" class="form-control @error('colonia') is-invalid @enderror" value="{{ old('colonia') }}">
              @error('colonia') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-2">
              <label for="numero_exterior">Número Exterior</label>
              <input type="text" name="numero_exterior" class="form-control @error('numero_exterior') is-invalid @enderror" value="{{ old('numero_exterior') }}">
              @error('numero_exterior') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-2">
              <label for="numero_interior">Número Interior</label>
              <input type="text" name="numero_interior" class="form-control @error('numero_interior') is-invalid @enderror" value="{{ old('numero_interior') }}">
              @error('numero_interior') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-2">
              <label for="codigo_postal">Código Postal</label>
              <input type="text" name="codigo_postal" class="form-control @error('codigo_postal') is-invalid @enderror" value="{{ old('codigo_postal') }}">
              @error('codigo_postal') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>

          {{-- Fila 3: Localidad - Ciudad - Estado --}}
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="localidad">Localidad</label>
              <input type="text" name="localidad" class="form-control @error('localidad') is-invalid @enderror" value="{{ old('localidad') }}">
              @error('localidad') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="ciudad">Ciudad</label>
              <input type="text" name="ciudad" class="form-control @error('ciudad') is-invalid @enderror" value="{{ old('ciudad') }}">
              @error('ciudad') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="estado">Estado</label>
              <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado') }}">
              @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>

          {{-- Fila 4: Correo - Teléfono - Celular --}}
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="correo">Correo</label>
              <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}">
              @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="telefono">Teléfono</label>
              <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}">
              @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="celular">Celular</label>
              <input type="text" name="celular" class="form-control @error('celular') is-invalid @enderror" value="{{ old('celular') }}">
              @error('celular') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Guardar</button>
          <a href="{{ route('admin.empresas.index') }}" class="btn btn-secondary">Cancelar</a>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
