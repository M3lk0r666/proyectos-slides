@extends('admin.layouts.app')

@section('title', 'Editar ticket')

@section('content')

    <h1 class="text-2xl font-bold mb-6">
        Editar ticket
    </h1>

    <form method="POST" action="{{ route('admin.agent-tickets.update', $agent_ticket) }}" class="bg-white p-6 rounded shadow">

        @csrf
        @method('PUT')

        @include('admin.agent-tickets._form', [
            'agent_ticket' => $agent_ticket,
        ])

        <div class="mt-6">

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Actualizar
            </button>

            <a href="{{ route('admin.agent-tickets.index') }}" class="ml-3 text-gray-600 hover:underline">
                Cancelar
            </a>

        </div>

    </form>

@endsection
