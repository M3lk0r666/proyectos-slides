@extends('admin.layouts.app')

@section('title', 'Tickets')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Tickets</h1>

        <a href="{{ route('admin.agent-tickets.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Nuevo ticket
        </a>
    </div>

    <table class="w-full bg-white shadow rounded">

        <thead class="bg-gray-200">
            <tr>
                <th class="p-3">Agente</th>
                <th class="p-3">Solicitante</th>
                <th class="p-3">Asunto</th>
                <th class="p-3">Ticket</th>
                <th class="p-3">Estatus</th>
                <th class="p-3 text-right">Acciones</th>
            </tr>
        </thead>

        <tbody>

            @forelse($tickets as $ticket)
                <tr class="border-t">

                    <td class="p-3">
                        {{ $ticket->globalAgent->agente_nombre }}
                    </td>

                    <td class="p-3">
                        {{ $ticket->solicitante }}
                    </td>

                    <td class="p-3">
                        {{ $ticket->asunto }}
                    </td>

                    <td class="p-3">
                        {{ $ticket->ticket_codigo }}
                    </td>

                    <td class="p-3">
                        {{ $ticket->estatus }}
                    </td>

                    <td class="p-3 text-right space-x-2">

                        <a href="{{ route('admin.agent-tickets.edit', $ticket) }}" class="text-blue-600 hover:underline">
                            Editar
                        </a>

                        <form action="{{ route('admin.agent-tickets.destroy', $ticket) }}" method="POST" class="inline"
                            onsubmit="return confirm('¿Eliminar ticket?')">

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
                        No hay tickets registrados
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

@endsection
