@extends('admin.layouts.app')

@section('title', 'Presentaciones')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Presentaciones</h1>
    <a href="{{ route('admin.presentations.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Nueva presentación
    </a>
</div>

<table class="w-full bg-white shadow rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3 text-left">Título</th>
            <th class="p-3 text-left">Periodo</th>
            <th class="p-3 text-left">Slug</th>
            <th class="p-3 text-right">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($presentations as $p)
            <tr class="border-t">
                <td class="p-3">{{ $p->titulo }}</td>
                <td class="p-3">{{ $p->periodo }}</td>
                <td class="p-3 text-sm text-gray-600">{{ $p->slug }}</td>
                <td class="p-3 text-right space-x-2">
                    <a href="{{ route('admin.presentations.edit', $p) }}"
                       class="text-blue-600 hover:underline">
                        Editar
                    </a>

                    <form action="{{ route('admin.presentations.destroy', $p) }}"
                          method="POST"
                          class="inline"
                          onsubmit="return confirm('¿Eliminar presentación?')">
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
                <td colspan="4" class="p-6 text-center text-gray-500">
                    No hay presentaciones registradas
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection