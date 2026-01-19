<x-public-layout>
    <x-slot name="title">Availability Calendar - 4 Get The Scoop</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Availability Calendar</h1>
                <div class="w-24 h-1 bg-pink-500 mx-auto mb-4"></div>
                <p class="text-gray-600">Check our availability and plan your event</p>
            </div>

            <!-- Legend -->
            <div class="flex flex-wrap justify-center gap-6 mb-8">
                <div class="flex items-center">
                    <span class="w-4 h-4 rounded bg-green-500 mr-2"></span>
                    <span class="text-gray-600">Available</span>
                </div>
                <div class="flex items-center">
                    <span class="w-4 h-4 rounded bg-blue-500 mr-2"></span>
                    <span class="text-gray-600">Booked</span>
                </div>
                <div class="flex items-center">
                    <span class="w-4 h-4 rounded bg-red-500 mr-2"></span>
                    <span class="text-gray-600">Unavailable</span>
                </div>
            </div>

            <!-- Calendar -->
            <div class="bg-white rounded-xl shadow-lg p-4 md:p-8">
                <div id="calendar"></div>
            </div>

            <!-- CTA -->
            <div class="text-center mt-8">
                <p class="text-gray-600 mb-4">Found a date that works for you?</p>
                <a href="{{ route('catering.create') }}" class="inline-block bg-pink-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-pink-700 transition">
                    Request a Booking
                </a>
            </div>
        </div>
    </div>

    @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css" rel="stylesheet">
    <style>
        .fc-event {
            cursor: default;
        }
        .fc-toolbar-title {
            font-size: 1.25rem !important;
        }
        @media (min-width: 768px) {
            .fc-toolbar-title {
                font-size: 1.5rem !important;
            }
        }
    </style>
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                events: '/api/calendar/availability',
                eventDisplay: 'block',
                displayEventTime: false,
                height: 'auto',
                validRange: {
                    start: new Date().toISOString().split('T')[0]
                },
                eventClick: function(info) {
                    if (info.event.extendedProps.status === 'available') {
                        if (confirm('Would you like to request a booking for ' + info.event.start.toLocaleDateString() + '?')) {
                            window.location.href = '{{ route('catering.create') }}?date=' + info.event.startStr;
                        }
                    }
                }
            });
            calendar.render();
        });
    </script>
    @endpush
</x-public-layout>
