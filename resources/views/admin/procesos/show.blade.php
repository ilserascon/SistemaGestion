{{-- filepath: c:\Users\ydiaz\OneDrive\Documentos\Estadias\SistemaGestion\resources\views\admin\procesos\show.blade.php --}}
@extends('layouts.stisla')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalles del Proceso</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Actividad: {{ $proceso->actividad }}</h5>
            <p class="card-text"><strong>Responsable:</strong> {{ $proceso->responsable }}</p>
            <p class="card-text"><strong>Desarrollo:</strong> {{ $proceso->desarrollo }}</p>
            <p class="card-text"><strong>Fecha Entregable:</strong> {{ $proceso->fecha_entregable ?? 'N/A' }}</p>
            <p class="card-text"><strong>Fecha Finalizado:</strong> {{ $proceso->fecha_finalizado ?? 'N/A' }}</p>
            <p class="card-text"><strong>Tipo:</strong> {{ $proceso->tipo }}</p>
            <p class="card-text"><strong>Liga:</strong> 
                @if ($proceso->liga)
                    <a href="{{ $proceso->liga }}" target="_blank">{{ $proceso->liga }}</a>
                @else
                    N/A
                @endif
            </p>
            <p class="card-text"><strong>Mensaje:</strong> {{ $proceso->mensaje }}</p>
            <p class="card-text"><strong>Validado:</strong> {{ $proceso->validado ? 'Sí' : 'No' }}</p>
        </div>
    </div>
    <a href="{{ route('admin.procesos.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection