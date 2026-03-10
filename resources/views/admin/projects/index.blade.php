@extends('admin.layouts.app')

@section('title', 'Proyectos')

@section('content')
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Proyectos</h1>
        <a href="{{ route('admin.projects.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
            Nuevo proyecto
        </a>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3">Logo</th>
                <th class="p-3">Cliente</th>
                <th class="p-3 text-left">Proyecto</th>
                <th class="p-3">Tecnología</th>


                <th class="p-3">Presentación</th>
                <th class="p-3">Estatus</th>
                <th class="p-3 text-right">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr class="border-t">
                    <td class="p-3">
                        @if ($project->cliente_logo_path)
                            <img src="{{ asset('storage/' . $project->cliente_logo_path) }}" class="h-10 object-contain">
                        @else
                            <span class="text-gray-400 text-sm">
                                Sin logo
                            </span>
                        @endif
                    </td>
                    <td class="p-3">{{ $project->cliente_nombre }}</td>
                    <td class="p-3">{{ $project->nombre }}</td>
                    <td class="p-3">{{ $project->tecnologia }}</td>
                    <td class="p-3 text-sm">
                        {{ $project->presentation->titulo }}
                    </td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-white bg-{{ $project->estatus_color }}-600">
                            {{ $project->estatus_label }}
                        </span>
                    </td>
                    <td class="p-3 text-right">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:underline">
                            Editar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
