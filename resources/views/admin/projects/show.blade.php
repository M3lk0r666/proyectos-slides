@extends('admin.layouts.app')

@section('title', 'Detalle Proyecto')

@section('content')

{{-- Header --}}
<div class="mb-6">
    <h1 class="text-2xl font-bold">{{ $project->nombre }}</h1>
    <p class="text-gray-600">
        {{ $project->cliente_nombre }} · {{ $project->tecnologia }}
    </p>

    <div class="mt-2">
        <span class="px-2 py-1 rounded text-white bg-{{ $project->estatus_color }}-600">
            {{ $project->estatus_label }}
        </span>
    </div>
</div>

{{-- Grid principal --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    {{-- PUNTOS CLAVE --}}
    <section class="bg-white p-4 rounded shadow">
        <div class="flex justify-between mb-2">
            <h2 class="font-semibold">Puntos clave</h2>
            <a href="{{ route('admin.key-points.create', ['project_id' => $project->id]) }}"
               class="text-sm text-blue-600">Agregar</a>
        </div>

        <ul class="list-disc pl-5 text-sm">
            @foreach($project->keyPoints as $kp)
                <li>{{ $kp->descripcion }}</li>
            @endforeach
        </ul>
    </section>

    {{-- FALTANTES --}}
    <section class="bg-white p-4 rounded shadow">
        <div class="flex justify-between mb-2">
            <h2 class="font-semibold">Faltantes</h2>
            <a href="{{ route('admin.missing-items.create', ['project_id' => $project->id]) }}"
               class="text-sm text-blue-600">Agregar</a>
        </div>

        <ul class="list-disc pl-5 text-sm">
            @foreach($project->missingItems as $m)
                <li>{{ $m->descripcion }}</li>
            @endforeach
        </ul>
    </section>

    {{-- ACTIVIDADES --}}
    <section class="bg-white p-4 rounded shadow col-span-full">
        <div class="flex justify-between mb-2">
            <h2 class="font-semibold">Actividades</h2>
            <a href="{{ route('admin.activities.create', ['project_id' => $project->id]) }}"
               class="text-sm text-blue-600">Nueva actividad</a>
        </div>

        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">Tema</th>
                    <th class="p-2">Estado</th>
                    <th class="p-2">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($project->activities as $a)
                    <tr class="border-t">
                        <td class="p-2">{{ $a->tema }}</td>
                        <td class="p-2">{{ $a->estado }}</td>
                        <td class="p-2">
                            {{ optional($a->dateline)->format('d/m/Y') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    {{-- PERSONAL NETJER --}}
    <section class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold mb-2">Personal Netjer</h2>
        <ul class="text-sm">
            @foreach($project->staffNetjer as $s)
                <li>{{ $s->nombre }} — {{ $s->rol }}</li>
            @endforeach
        </ul>
    </section>

    {{-- RESPONSABLES CLIENTE --}}
    <section class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold mb-2">Responsables Cliente</h2>
        <ul class="text-sm">
            @foreach($project->clientContacts as $c)
                <li>{{ $c->nombre }} — {{ $c->puesto }}</li>
            @endforeach
        </ul>
    </section>

</div>

@endsection