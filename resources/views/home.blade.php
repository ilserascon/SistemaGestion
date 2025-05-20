
@extends('layouts.stisla')

@section('title', 'Inicio')

@section('content')
<div class="section">
    <div class="section-header">
        <h1>Bienvenido, {{ Auth::user()->name }}</h1>
    </div>

    <div class="section-body">
        <div id="calendar"></div>
    </div>
</div>
@endsection

@push('styles')
<style>
    #calendar {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        min-height: 500px; /* Asegura que tenga altura */
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            events: '/agenda/eventos', // Ruta para cargar eventos desde el backend
        });

        calendar.render();
    });
</script>
@endpush