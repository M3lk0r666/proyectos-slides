@extends('admin.layouts.app')

@section('title', 'Editar Reporte')

@section('content')

    <h1 class="text-2xl font-bold mb-6">
        Editar Reporte
    </h1>

    <form method="POST" action="{{ route('admin.reports.update', $report) }}" class="bg-white p-6 rounded shadow">

        @csrf
        @method('PUT')

        @include('admin.reports._form', [
            'report' => $report,
        ])

        <div class="mt-6">

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Actualizar
            </button>

            <a href="{{ route('admin.reports.index') }}" class="ml-3 text-gray-600 hover:underline">
                Cancelar
            </a>

        </div>

    </form>

@endsection
