@extends('admin.layouts.app')

@section('title', 'Faltantes')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Faltantes</h1>

        <a href="{{ route('admin.missing-items.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Nuevo faltante
        </a>
    </div>

    <table class="w-full bg-white shadow rounded">

        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 text-left">Proyecto</th>
                <th class="p-3 text-left">Descripción</th>
                <th class="p-3 text-right">Acciones</th>
            </tr>
        </thead>

        <tbody>

            @forelse($items as $item)
                <tr class="border-t">

                    <td class="p-3">
                        {{ $item->project->nombre }}
                    </td>

                    <td class="p-3">
                        {{ $item->descripcion }}
                    </td>

                    <td class="p-3 text-right space-x-3">

                        <a href="{{ route('admin.missing-items.edit', $item) }}" class="text-blue-600 hover:underline">
                            Editar
                        </a>

                        <form action="{{ route('admin.missing-items.destroy', $item) }}" method="POST" class="inline"
                            onsubmit="return confirm('¿Eliminar faltante?')">

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
                    <td colspan="3" class="p-6 text-center text-gray-500">
                        No hay faltantes registrados
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

@endsection
