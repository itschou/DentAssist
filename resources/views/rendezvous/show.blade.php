@extends('layouts.app')
@extends('components.navbar')

@section('content')

@section('content-navbar')
<div class="w-full">
    <div class="overflow-hidden rounded-lg shadow-lg">
      <div id="calendar" class="w-full"></div>
    </div>
  </div>
  

    
@endsection

@endsection

@push('scriptss')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                slotMinTime: '8:00:00',
                slotMaxTime: '18:30:00',
                locale: 'fr', // Définir la langue sur français
                events: @json($events),
                contentHeight: 'auto', // Ajuster la hauteur automatiquement pour plus de marge en dessous
            });
            calendar.render();
        });
        </script>
        
@endpush