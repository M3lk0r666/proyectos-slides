<h2 class="text-xl font-semibold mb-4">
    Reportes
</h2>

<div class="flex justify-between items-center mb-4">

    <a href="{{ route('admin.reports.create', [
        'presentation_id' => $presentation->id,
    ]) }}"
        class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm">
        Nuevo reporte
    </a>

</div>


<div class="bg-white shadow rounded overflow-hidden">

    <table class="w-full text-sm">

        <thead class="bg-gray-100">

            <tr>
                <th class="p-3 text-left">Item</th>
                <th class="p-3 text-left">Cliente</th>
                <th class="p-3 text-left">Responsable</th>
                <th class="p-3 text-left">Entrega Cliente</th>
                <th class="p-3 text-right">Acciones</th>
            </tr>

        </thead>

        <tbody>

            @forelse($presentation->reports->sortBy('item') as $report)
                <tr class="border-t hover:bg-gray-50">

                    <td class="p-3 font-medium">
                        {{ $report->item }}
                    </td>

                    <td class="p-3">
                        {{ $report->cliente }}
                    </td>

                    <td class="p-3">
                        {{ $report->responsable_sesion }}
                    </td>

                    <td class="p-3">

                        @if ($report->fecha_entrega_cliente)
                            {{ \Carbon\Carbon::parse($report->fecha_entrega_cliente)->format('d/m/Y') }}
                        @endif

                    </td>

                    <td class="p-3 text-right space-x-3">

                        <a href="{{ route('admin.reports.edit', $report) }}"
                            class="text-blue-600 hover:underline text-sm">
                            Editar
                        </a>

                        <form action="{{ route('admin.reports.destroy', $report) }}" method="POST" class="inline"
                            onsubmit="return confirm('¿Eliminar reporte?')">

                            @csrf
                            @method('DELETE')

                            <button class="text-red-600 hover:underline text-sm">
                                Eliminar
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="p-6 text-center text-gray-500">
                        No hay reportes registrados
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

</div>
