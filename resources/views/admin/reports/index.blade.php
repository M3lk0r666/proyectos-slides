@extends('admin.layouts.app')

@section('title', 'Reportes')

@section('content')
<div class="flex justify-between mb-6">
    <h1 class="text-2xl font-bold">Reportes</h1>
    <a href="{{ route('admin.reports.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">
        Nuevo reporte
    </a>
</div>

<table class="w-full bg-white rounded shadow">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">Cliente</th>
            <th class="p-3">Presentación</th>
            <th class="p-3">Entrega</th>
            <th class="p-3">Responsable</th>
            <th class="p-3 text-right">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reports as $r)
            <tr class="border-t">
                <td class="p-3">{{ $r->cliente }}</td>
                <td class="p-3 text-sm">{{ $r->presentation->titulo }}</td>
                <td class="p-3">
                    {{ optional($r->fecha_entrega_cliente)->format('d/m/Y') }}
                </td>
                <td class="p-3">{{ $r->responsable_sesion }}</td>
                <td class="p-3 text-right">
                    <a href="{{ route('admin.reports.edit', $r) }}"
                       class="text-blue-600 hover:underline">
                        Editar
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection