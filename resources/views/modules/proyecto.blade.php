{{-- <x-slide.section :title="$proyecto['nombre']">

    <div class="flex items-center gap-6 mb-6">
        <img src="{{ $proyecto['cliente']['logo'] }}" class="h-16">
        <h3 class="text-2xl">{{ $proyecto['cliente']['nombre'] }}</h3>
    </div>

    <div class="space-x-2 mb-4">
        <x-slide.badge color="blue">{{ $proyecto['tecnologia'] }}</x-slide.badge>
        <x-slide.badge :color="$proyecto['estatus']['color']">
            {{ $proyecto['estatus']['label'] }}
        </x-slide.badge>
    </div>

    <ul class="list-disc ml-6 mb-4">
        @foreach ($proyecto['puntos_clave'] as $punto)
            <li>{{ $punto }}</li>
        @endforeach
    </ul>

</x-slide.section> --}}
<x-slide.section :title="$proyecto['nombre']">

    {{-- Cliente --}}
    {{--  @if ($project->cliente_logo_path)
        <div class="flex items-center gap-6 mb-6">
            <img src="{{ $proyecto['cliente']['logo'] }}" class="h-16">
            <img src="{{ asset('storage/' . $project->cliente_logo_path) }}" class="h-16 mx-auto mb-4">
            <h3 class="text-2xl font-semibold">
                {{ $proyecto['cliente']['nombre'] }}
            </h3>
        </div>
    @endif --}}
    @if (!empty($proyecto['cliente']['logo']))
        <div class="flex items-center gap-6 mb-6">

            {{-- <img src="{{ asset('storage/' . $proyecto['cliente']['logo']['path']) }}" class="h-16 mx-auto mb-4"> --}}
            <img src="{{ asset('storage/' . $proyecto['cliente']['logo']) }}" class="h-16 mx-auto mb-4">

            <h3 class="text-2xl font-semibold">
                {{ $proyecto['cliente']['nombre'] }}
            </h3>

        </div>
    @endif

    {{-- Metadata --}}
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

    {{-- Bloques --}}
    <div class="grid grid-cols-2 gap-8">

        <x-proyecto.puntos-clave :items="$proyecto['puntos_clave'] ?? []" />

        <x-proyecto.faltantes :items="$proyecto['faltantes'] ?? []" />

        <x-proyecto.personal :personas="$proyecto['personal_netjer'] ?? []" />

        <x-proyecto.responsables :personas="$proyecto['responsables_cliente'] ?? []" />

    </div>

</x-slide.section>
