@extends('admin.layouts.app')

@section('title', 'Editor Presentación')

@section('content')

    <h1 class="text-2xl font-bold mb-6">
        Editor: {{ $presentation->titulo }}
    </h1>

    @include('admin.editor.dashboard')
    @if ($stats['missing'] > 0)
        <div class="bg-yellow-100 border border-yellow-300 text-yellow-800 p-3 rounded mb-6">

            ⚠ Hay {{ $stats['missing'] }} faltantes pendientes antes de la reunión.

        </div>
    @endif

    {{-- PROYECTOS --}}
    <div class="mb-10">
        <h2 class="text-xl font-semibold mb-3">
            Proyectos
        </h2>
        <a href="{{ route('admin.projects.create', [
            'presentation_id' => $presentation->id,
        ]) }}"
            class="btn-primary">
            Nuevo proyecto
        </a>

        @foreach ($presentation->projects as $project)
            <div class="bg-white shadow rounded p-4 mt-4">
                <h3 class="font-semibold text-lg">
                    {{ $project->nombre }}
                </h3>
                @include('admin.editor.project-block', ['project' => $project])
            </div>
        @endforeach
    </div>

    {{-- REPORTES --}}
    @include('admin.editor.reports')

    {{-- TICKETS --}}
    @include('admin.editor.tickets')

@endsection
