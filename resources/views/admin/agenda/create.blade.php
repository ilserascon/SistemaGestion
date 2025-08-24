@extends('layouts.stisla')

@section('title', 'Crear Cita')

@section('content')
<div class="section">
  <div class="section-header">
    <h1>Crear Nueva Cita</h1>
  </div>

  <div class="section-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.agenda.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="evento">Título del Evento</label>
        <input type="text" name="evento" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="start_date">Fecha y hora de inicio</label>
        <input type="datetime-local" name="start_date" class="form-control" required>
      </div>

    

      <button type="submit" class="btn btn-success">Guardar Cita</button>
      <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
@endsection



