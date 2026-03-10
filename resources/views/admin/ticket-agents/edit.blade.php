@extends('admin.layouts.app')

@section('title', 'Editar agente')

@section('content')

    <h1 class="text-2xl font-bold mb-6">
        Editar agente de tickets
    </h1>

    <form method="POST" action="{{ route('admin.ticket-agents.update', $ticket_agent) }}" class="bg-white p-6 rounded shadow">

        @csrf
        @method('PUT')

        @include('admin.ticket-agents._form', [
            'ticket_agent' => $ticket_agent,
        ])

        <div class="mt-6">

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Actualizar
            </button>

            <a href="{{ route('admin.ticket-agents.index') }}" class="ml-3 text-gray-600 hover:underline">
                Cancelar
            </a>

        </div>

    </form>

@endsection
