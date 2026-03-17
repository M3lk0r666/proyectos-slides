{{-- <x-slide.section :title="$proyecto['nombre']">
    @if (!empty($proyecto['cliente']['logo']))
        <div class="flex items-center gap-6 mb-6">
            <img src="{{ asset('storage/' . $proyecto['cliente']['logo']) }}" class="h-16 mx-auto mb-4">
            <h3 class="text-2xl font-semibold">
                {{ $proyecto['cliente']['nombre'] }}
            </h3>
        </div>
    @endif

    <div class="space-x-2 mb-6">
        <x-slide.badge color="blue">
            {{ $proyecto['tecnologia'] }}
        </x-slide.badge>
        <x-slide.badge :color="$proyecto['estatus']['color']">
            {{ $proyecto['estatus']['label'] }}
        </x-slide.badge>
        <x-slide.badge color="gray">
            {{ $proyecto['fecha_programada'] }} · {{ $proyecto['horario'] }}
        </x-slide.badge>
    </div>


    <div class="grid grid-cols-2 gap-8">
        <x-proyecto.puntos-clave :items="$proyecto['puntos_clave'] ?? []" />
        <x-proyecto.faltantes :items="$proyecto['faltantes'] ?? []" />
        <x-proyecto.personal :personas="$proyecto['personal_netjer'] ?? []" />
        <x-proyecto.responsables :personas="$proyecto['responsables_cliente'] ?? []" />
    </div>
</x-slide.section> --}}

{{-- <x-slide.netjer status="EN PROCESO">
    <div class="grid grid-cols-2 gap-20">
        <div>
            <h1 class="text-red-700">
                {{ $proyecto['cliente']['nombre'] }}
            </h1>
            <p class="mt-6">
                <strong>Tecnología:</strong>
                {{ $proyecto['tecnologia'] }}
            </p>
            <p>
                <strong>Fecha programada:</strong>
                {{ $proyecto['fecha_programada'] }}
            </p>
            <p>
                <strong>Horario:</strong>
                {{ $proyecto['horario'] }}
            </p>
            <p>
                <strong>Estatus:</strong>
                {{ $proyecto['estatus']['label'] }}
            </p>
            <p>
                <strong>Fecha:</strong>
                {{ $proyecto['fecha_programada'] }} · {{ $proyecto['horario'] }}
            </p>
        </div>
        <div>
            <h3 class="text-xl font-semibold mb-4">
                Puntos clave
            </h3>
            <ul class="space-y-2">
                @foreach ($proyecto['puntos_clave'] as $point)
                    <li> {{ $point }}</li>
                @endforeach
            </ul>
        </div>
        
        <div class="grid grid-cols-2 gap-16 mt-12">      
            <div>
                <h3 class="text-xl font-semibold mb-4">
                    Personal Netjer
                </h3>
                <ul class="space-y-2">
                    @foreach ($proyecto['personal_netjer'] as $staff)
                        <li>
                            {{ $staff['nombre'] }}
                            <span class="text-gray-500 text-sm">
                                ({{ $staff['rol'] }})
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>   
            <div>
                <h3 class="text-xl font-semibold mb-4">
                    Responsables Cliente
                </h3>
                <ul class="space-y-2">
                    @foreach ($proyecto['responsables_cliente'] as $contact)
                        <li>
                            {{ $contact['nombre'] }}
                            <span class="text-gray-500 text-sm">
                                ({{ $contact['puesto'] }})
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-slide.netjer> --}}

<x-slide.netjer :status="$proyecto['estatus']['label']" :statusColor="$proyecto['estatus']['color']">

    {{-- GRID PRINCIPAL --}}
    <div class="grid grid-cols-12 gap-10 w-full">

        {{-- ========================================
        COLUMNA 1
        DATOS DEL PROYECTO
        ======================================== --}}
        <div class="col-span-4 space-y-6">
            {{-- LOGO CLIENTE --}}
            {{-- LOGO O NOMBRE CLIENTE --}}

            @if (!empty($proyecto['cliente']['logo']))
                <img src="{{ asset('storage/' . $proyecto['cliente']['logo']) }}" class="max-h-16 object-contain mb-4">
            @else
                <h2 class="text-5xl font-black" style="color: {{ $proyecto['cliente']['color'] }}">
                    {{ $proyecto['cliente']['nombre'] }}
                </h2>
            @endif
            <div class="space-y-2 text-base">
                <p>
                    <span class="text-gray-500">Proyecto:</span>
                    <strong>{{ $proyecto['nombre'] }}</strong>
                </p>
                <p>
                    <span class="text-gray-500">Tecnología:</span>
                    <strong>{{ $proyecto['tecnologia'] }}</strong>
                </p>
                <p>
                    <span class="text-gray-500">Fecha programada:</span>
                    <strong>{{ $proyecto['fecha_programada'] }}</strong>
                </p>
                <p>
                    <span class="text-gray-500">Horario:</span>
                    <strong>{{ $proyecto['horario'] }}</strong>
                </p>
                <p>
                    <span class="text-gray-500">Estatus:</span>
                    <strong>{{ $proyecto['estatus']['label'] }}</strong>
                </p>
            </div>
        </div>

        {{-- ========================================
        COLUMNA 2
        PERSONAL NETJER
        ======================================== --}}
        <div class="col-span-4">
            <h3 class="text-xl font-semibold mb-6">
                Personal Netjer
            </h3>
            <div class="relative pl-10">
                {{-- linea timeline --}}
                <div class="absolute left-4 top-0 bottom-0 w-1 bg-green-500"></div>
                {{-- <div class="space-y-6">
                    @foreach ($proyecto['personal_netjer'] as $staff)
                        <div class="relative fragment fade-up">
                            
                            <div class="absolute -left-1 top-2 w-4 h-4 bg-green-500 rounded-full"></div>
                            <div>
                                <div class="font-semibold">
                                    {{ $staff['nombre'] }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $staff['rol'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
                <x-proyecto.timelinea :proyecto="$proyecto" />
            </div>
        </div>

        {{-- ========================================
        COLUMNA 3
        PERSONAL CLIENTE
        ======================================== --}}
        <div class="col-span-4">
            <h3 class="text-xl font-semibold mb-6">
                Personal Cliente
            </h3>
            <div class="relative pl-10">
                {{-- linea timeline --}}
                <div class="absolute left-4 top-0 bottom-0 w-1 bg-green-500"></div>
                {{--
                Color de time line en base al logo del cliente
                 <div class="w-1 h-full" style="background: {{ $proyecto['cliente']['color'] }}"></div> --}}
                <x-proyecto.timelineb :proyecto="$proyecto" />
            </div>
        </div>
    </div>

    {{-- ========================================
    SEGUNDA FILA
    ======================================== --}}
    <div class="grid grid-cols-2 gap-10 mt-10">
        {{-- puntos clave --}}
        <div>
            <h3 class="titulo-con-linea text-lg font-semibold mb-2">
                Puntos Clave
            </h3>
            <ul class="space-y-1">
                @foreach ($proyecto['puntos_clave'] as $p)
                    <li class="fragment fade-in">
                        ✓ {{ $p }}
                    </li>
                @endforeach
            </ul>
        </div>
        {{-- faltantes --}}
        <div>
            <h3 class="titulo-con-linea text-lg font-semibold mb-2">
                Faltantes
            </h3>
            <ul class="text-red-600">
                @foreach ($proyecto['faltantes'] as $f)
                    <li>
                        {{ $f }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</x-slide.netjer>
