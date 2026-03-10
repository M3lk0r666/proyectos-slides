<div class="grid grid-cols-5 gap-6 mb-8">

    {{-- PROYECTOS --}}
    <div class="bg-white border rounded-lg shadow-sm p-4">

        <div class="text-xs text-gray-400 uppercase">
            Proyectos
        </div>

        <div class="text-3xl font-bold mt-2 text-gray-800">
            {{ $stats['projects'] }}
        </div>

    </div>


    {{-- ACTIVIDADES --}}
    <div class="bg-white border rounded-lg shadow-sm p-4">

        <div class="text-xs text-gray-400 uppercase">
            Actividades
        </div>

        <div class="text-3xl font-bold mt-2 text-gray-800">
            {{ $stats['activities'] }}
        </div>

    </div>


    {{-- FALTANTES --}}
    @php
        $missing = $stats['missing'];

        $color = 'text-green-600';
        $icon = '✔';

        if ($missing >= 1 && $missing <= 3) {
            $color = 'text-yellow-500';
            $icon = '⚠';
        }

        if ($missing > 3) {
            $color = 'text-red-600';
            $icon = '✖';
        }
    @endphp

    <div class="bg-white border rounded-lg shadow-sm p-4">

        <div class="text-xs text-gray-400 uppercase">
            Faltantes
        </div>

        <div class="text-3xl font-bold mt-2 {{ $color }}">
            {{ $icon }} {{ $missing }}
        </div>

    </div>


    {{-- TICKETS --}}
    <div class="bg-white border rounded-lg shadow-sm p-4">

        <div class="text-xs text-gray-400 uppercase">
            Tickets
        </div>

        <div class="text-3xl font-bold mt-2 text-gray-800">
            {{ $stats['tickets'] }}
        </div>

    </div>


    {{-- REPORTES --}}
    <div class="bg-white border rounded-lg shadow-sm p-4">

        <div class="text-xs text-gray-400 uppercase">
            Reportes
        </div>

        <div class="text-3xl font-bold mt-2 text-gray-800">
            {{ $stats['reports'] }}
        </div>

    </div>

</div>
