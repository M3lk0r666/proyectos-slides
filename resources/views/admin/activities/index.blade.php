@extends('admin.layouts.app')

@section('title', 'Actividades')

@section('content')
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Actividades</h1>
        <a href="{{ route('admin.activities.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
            Nueva actividad
        </a>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3">Proyecto</th>
                <th class="p-3">Tema</th>
                <th class="p-3">Estado</th>
                <th class="p-3">Fecha</th>
                <th class="p-3 text-right">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $a)
                <tr class="border-t">
                    <td class="p-3 text-sm">
                        {{ $a->project->nombre }}
                    </td>
                    <td class="p-3">{{ $a->tema }}</td>
                    <td class="p-3">{{ $a->estado }}</td>
                    <td class="p-3">
                        {{ optional($a->dateline)->format('d/m/Y') }}
                    </td>
                    <td class="p-3 text-right">
                        <a href="{{ route('admin.activities.edit', $a) }}" class="text-blue-600 hover:underline">
                            Editar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
