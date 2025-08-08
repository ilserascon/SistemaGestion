{{-- filepath: c:\Users\ydiaz\OneDrive\Documentos\Estadias\SistemaGestion\resources\views\admin\procesos\create.blade.php --}}
@extends('layouts.stisla')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Nuevo Proceso</h1>
    <form action="{{ route('admin.procesos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="actividad" class="form-label">Actividad</label>
            <input type="text" class="form-control" id="actividad" name="actividad" required>
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="responsable" class="form-label">Responsable</label>
                <input type="text" class="form-control" id="responsable" name="responsable" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="desarrollo" class="form-label">Desarrollo</label>
            <textarea class="form-control" id="desarrollo" name="desarrollo" rows="3" required></textarea>
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="fecha_entregable" class="form-label">Fecha Entregable</label>
                <input type="date" class="form-control" id="fecha_entregable" name="fecha_entregable">
            </div>
            <div class="mb-3 col-md-6">
                <label for="fecha_finalizado" class="form-label">Fecha Finalizado</label>
                <input type="date" class="form-control" id="fecha_finalizado" name="fecha_finalizado">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="liga" class="form-label">Liga</label>
                <input type="text" class="form-control" id="liga" name="liga">
            </div>
            <div class="mb-3 col-md-6">
                <label for="validado" class="form-label">Validado</label>
                <select class="form-control" id="validado" name="validado">
                    <option value="0">No</option>
                    <option value="1">Sí</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('admin.procesos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection