<h2 class="text-xl font-semibold mb-4">
    Tickets
</h2>


<div class="space-y-4">

    @forelse($presentation->ticketAgents as $agent)

        <div class="bg-white shadow rounded">

            <div class="flex justify-between items-center p-4 border-b">

                <div>

                    <h3 class="font-semibold">
                        {{ $agent->agente_nombre }}
                    </h3>

                    <p class="text-sm text-gray-500">
                        Resumen de tickets
                    </p>

                </div>

                <div class="flex gap-3 text-sm">

                    <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded">
                        Asignados: {{ $agent->asignados }}
                    </span>

                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded">
                        Cerrados: {{ $agent->cerrados }}
                    </span>

                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded">
                        En curso: {{ $agent->en_curso }}
                    </span>

                </div>

            </div>


            {{-- LISTADO DE TICKETS DEL AGENTE --}}

            <div class="p-4">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50">

                        <tr>
                            <th class="p-2 text-left">Ticket</th>
                            <th class="p-2 text-left">Solicitante</th>
                            <th class="p-2 text-left">Asunto</th>
                            <th class="p-2 text-left">Estatus</th>
                            <th class="p-2 text-right">Acciones</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($agent->items as $ticket)
                            <tr class="border-t">

                                <td class="p-2 font-medium">
                                    {{ $ticket->ticket_codigo }}
                                </td>

                                <td class="p-2">
                                    {{ $ticket->solicitante }}
                                </td>

                                <td class="p-2">
                                    {{ $ticket->asunto }}
                                </td>

                                <td class="p-2">
                                    {{ $ticket->estatus }}
                                </td>

                                <td class="p-2 text-right">

                                    <a href="{{ route('admin.agent-tickets.edit', $ticket) }}"
                                        class="text-blue-600 hover:underline text-sm">
                                        Editar
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="p-3 text-gray-500 text-center">
                                    No hay tickets registrados
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    @empty

        <div class="bg-white shadow rounded p-6 text-center text-gray-500">
            No hay agentes de tickets registrados
        </div>

    @endforelse

</div>
