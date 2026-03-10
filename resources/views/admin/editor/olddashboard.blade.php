<div class="grid grid-cols-5 gap-4 mb-8">

    <div class="bg-white shadow rounded p-4 text-center">
        <div class="text-gray-400 text-xs uppercase">Proyectos</div>
        <div class="text-2xl font-bold">{{ $stats['projects'] }}</div>
    </div>

    <div class="bg-white shadow rounded p-4 text-center">
        <div class="text-gray-400 text-xs uppercase">Actividades</div>
        <div class="text-2xl font-bold">{{ $stats['activities'] }}</div>
    </div>

    {{--  <div class="bg-white shadow rounded p-4 text-center">
        <div class="text-gray-400 text-xs uppercase">Faltantes</div>
        <div class="text-2xl font-bold text-red-600">
            {{ $stats['missing'] }}
        </div>
    </div> --}}
    <div class="bg-white shadow rounded p-4 text-center">
        <div class="text-gray-400 text-xs uppercase">
            Faltantes
        </div>
        <div
            class="text-2xl font-bold
            @if ($stats['missing'] == 0) text-green-600
                @elseif($stats['missing'] <= 3) text-yellow-500
                @else text-red-600 @endif
                    ">
            {{ $stats['missing'] }}
        </div>
    </div>

    <div class="bg-white shadow rounded p-4 text-center">
        <div class="text-gray-400 text-xs uppercase">Tickets</div>
        <div class="text-2xl font-bold">
            {{ $stats['tickets'] }}
        </div>
    </div>

    <div class="bg-white shadow rounded p-4 text-center">
        <div class="text-gray-400 text-xs uppercase">Reportes</div>
        <div class="text-2xl font-bold">
            {{ $stats['reports'] }}
        </div>
    </div>

</div>
