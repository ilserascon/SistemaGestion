@extends('layouts.stisla')

@section('title', 'Agenda')

@section('content')
<div class="section">
  <div class="section-header">
    <h1>Agenda</h1>
    <div class="section-header-button ml-auto">
      <a href="{{ route('admin.agenda.create') }}" class="btn btn-primary">Agendar Cita</a>
    </div>
  </div>  

  <div class="section-body">
    <div class="card">
      <div class="card-body">
        <div id="calendar"></div>
      </div>
    </div>
  </div>
</div>    
@endsection


@push('scripts')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');

    const calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      height: 'auto',
      locale: 'es',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      events: @json($eventos),
      displayEventTime: true,
      eventTimeFormat: { // formato 24 horas con dos dígitos
        hour: '2-digit',
        minute: '2-digit',
        hour12: false
      },
      eventMaxStack: 3,
      eventMinHeight: 24,
      dayMaxEvents: true,

      eventClick: function(info) {
        if (confirm(`¿Quieres eliminar la cita "${info.event.title}"?`)) {
          fetch(`{{ url('admin/agenda') }}/${info.event.id}`, {
            method: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
              'Accept': 'application/json',
              'Content-Type': 'application/json'
            }
          })
          .then(response => {
            if (!response.ok) {
              throw new Error('Error en la respuesta del servidor');
            }
            return response.json();
          })
          .then(data => {
            if (data.success) {
              info.event.remove(); // elimina el evento del calendario
              alert(data.message);
            } else {
              alert(data.message || 'No se pudo eliminar la cita');
            }
          })
          .catch(() => alert('Error al eliminar la cita'));
        }
      }
    });

    calendar.render();
  });
</script>
@endpush
