@extends('admin.layouts.app')

@section('title', 'Editar punto clave')

@section('content')

    <h1 class="text-2xl font-bold mb-6">
        Editar punto clave
    </h1>

    <form method="POST" action="{{ route('admin.key-points.update', $key_point) }}" class="bg-white p-6 rounded shadow">

        @csrf
        @method('PUT')

        @include('admin.key-points._form', [
            'key_point' => $key_point,
        ])

        <div class="mt-6">

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Actualizar
            </button>

            <a href="{{ route('admin.key-points.index') }}" class="ml-3 text-gray-600 hover:underline">
                Cancelar
            </a>

        </div>

    </form>

@endsection
