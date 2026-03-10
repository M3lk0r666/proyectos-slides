@extends('admin.layouts.app')

@section('title', 'Editar faltante')

@section('content')

    <h1 class="text-2xl font-bold mb-6">
        Editar faltante
    </h1>

    <form method="POST" action="{{ route('admin.missing-items.update', $missing_item) }}" class="bg-white p-6 rounded shadow">

        @csrf
        @method('PUT')

        @include('admin.missing-items._form', [
            'missing_item' => $missing_item,
        ])

        <div class="mt-6">

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Actualizar
            </button>

            <a href="{{ route('admin.missing-items.index') }}" class="ml-3 text-gray-600 hover:underline">
                Cancelar
            </a>

        </div>

    </form>

@endsection
