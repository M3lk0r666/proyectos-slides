{{-- <x-slide.section :title="$actividad['nombre']">
    <ul class="space-y-3 text-xl">
        <li><strong>Estatus:</strong> {{ $actividad['estatus'] }}</li>
        <li><strong>Tecnología:</strong> {{ $actividad['tecnologia'] }}</li>
        <li><strong>Fecha:</strong> {{ $actividad['fecha'] }}</li>
    </ul>
</x-slide.section> --}}
{{-- <x-slide.section :title="$actividad['nombre']">
    <div class="mb-6 space-x-2">
        <x-slide.badge color="blue">
            {{ $actividad['tecnologia'] }}
        </x-slide.badge>
        <x-slide.badge color="green">
            {{ $actividad['estatus'] }}
        </x-slide.badge>
    </div>
    <x-slide.table :headers="['Campo', 'Valor']">
        <tr>
            <td class="p-3">Fecha</td>
            <td class="p-3">{{ $actividad['fecha'] }}</td>
        </tr>
    </x-slide.table>
</x-slide.section> --}}
<x-slide.section :title="$actividad['nombre']">

    <div class="mb-6 flex gap-2">
        <x-slide.badge color="blue">
            {{ $actividad['tecnologia'] }}
        </x-slide.badge>

        <x-slide.badge color="green">
            {{ $actividad['estatus'] }}
        </x-slide.badge>
    </div>

    <x-slide.table :headers="['Campo', 'Valor']">

        <tr>
            <td class="p-3 font-medium">Fecha</td>
            <td class="p-3">{{ $actividad['fecha'] }}</td>
        </tr>

    </x-slide.table>

</x-slide.section>
