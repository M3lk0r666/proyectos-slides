@extends('admin.layouts.app')

@section('title', 'Editar Responsable Cliente')

@section('content')

    <h1 class="text-2xl font-bold mb-6">
        Editar Responsable Cliente
    </h1>

    <form method="POST" action="{{ route('admin.client-contacts.update', $client_contact) }}"
        class="bg-white p-6 rounded shadow">

        @csrf
        @method('PUT')

        @include('admin.client-contacts._form', [
            'client_contact' => $client_contact,
        ])

        <div class="mt-6">

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Actualizar
            </button>

            <a href="{{ route('admin.client-contacts.index') }}" class="ml-3 text-gray-600 hover:underline">
                Cancelar
            </a>

        </div>

    </form>

@endsection
