@extends('admin.layouts.app')

@section('title', 'Reportes')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Reportes</h1>

        <a href="{{ route('admin.reports.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Nuevo reporte
        </a>
    </div>

    <table class="w-full bg-white shadow rounded">

        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 text-left">Presentación</th>
                <th class="p-3 text-left">Cliente</th>
                <th class="p-3 text-left">Responsable</th>
                <th class="p-3 text-center">Entrega Cliente</th>
                <th class="p-3 text-right">Acciones</th>
            </tr>
        </thead>

        <tbody>

            @forelse($reports as $report)
                <tr class="border-t">

                    <td class="p-3">
                        {{ $report->presentation->titulo }}
                    </td>

                    <td class="p-3">
                        {{ $report->cliente }}
                    </td>

                    <td class="p-3">
                        {{ $report->responsable_sesion }}
                    </td>

                    <td class="p-3 text-center">
                        {{ optional($report->fecha_entrega_cliente)->format('d/m/Y') }}
                    </td>

                    <td class="p-3 text-right space-x-2">

                        <a href="{{ route('admin.reports.edit', $report) }}" class="text-blue-600 hover:underline">
                            Editar
                        </a>

                        <form action="{{ route('admin.reports.destroy', $report) }}" method="POST" class="inline"
                            onsubmit="return confirm('¿Eliminar reporte?')">

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
                    <td colspan="5" class="p-6 text-center text-gray-500">
                        No hay reportes registrados
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

@endsection
