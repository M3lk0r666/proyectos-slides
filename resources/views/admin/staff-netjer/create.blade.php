@extends('admin.layouts.app')

@section('title', 'Nuevo Personal Netjer')

@section('content')

    <h1 class="text-2xl font-bold mb-6">
        Nuevo Personal Netjer
    </h1>

    <form method="POST" action="{{ route('admin.staff-netjer.store') }}" class="bg-white p-6 rounded shadow">

        @csrf

        @include('admin.staff-netjer._form')

        <div class="mt-6">

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Guardar
            </button>

            <a href="{{ route('admin.staff-netjer.index') }}" class="ml-3 text-gray-600 hover:underline">
                Cancelar
            </a>

        </div>

    </form>

@endsection
