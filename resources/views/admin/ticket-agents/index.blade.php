@extends('admin.layouts.app')

@section('title', 'Tickets por Agente')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Tickets por Agente</h1>

        <a href="{{ route('admin.ticket-agents.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Nuevo agente
        </a>
    </div>

    <table class="w-full bg-white shadow rounded">

        <thead class="bg-gray-200">
            <tr>
                <th class="p-3">Presentación</th>
                <th class="p-3">Agente</th>
                <th class="p-3 text-center">Asignados</th>
                <th class="p-3 text-center">Cerrados</th>
                <th class="p-3 text-center">En curso</th>
                <th class="p-3 text-right">Acciones</th>
            </tr>
        </thead>

        <tbody>

            @forelse($agents as $agent)
                <tr class="border-t">

                    <td class="p-3">
                        {{ $agent->presentation->titulo }}
                    </td>

                    <td class="p-3">
                        {{ $agent->agente_nombre }}
                    </td>

                    <td class="p-3 text-center">
                        {{ $agent->asignados }}
                    </td>

                    <td class="p-3 text-center">
                        {{ $agent->cerrados }}
                    </td>

                    <td class="p-3 text-center">
                        {{ $agent->en_curso }}
                    </td>

                    <td class="p-3 text-right space-x-2">

                        <a href="{{ route('admin.ticket-agents.edit', $agent) }}" class="text-blue-600 hover:underline">
                            Editar
                        </a>

                        <form action="{{ route('admin.ticket-agents.destroy', $agent) }}" method="POST" class="inline"
                            onsubmit="return confirm('¿Eliminar agente?')">

                            @csrf
                            @method('DELETE')

                            <button class="text-red-600 hover:underline">
                                Eliminar
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="p-6 text-center text-gray-500">
                        No hay agentes registrados
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>

@endsection
