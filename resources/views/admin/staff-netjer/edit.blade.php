@extends('admin.layouts.app')

@section('title', 'Editar Personal Netjer')

@section('content')

    <h1 class="text-2xl font-bold mb-6">
        Editar Personal Netjer
    </h1>

    <form method="POST" action="{{ route('admin.staff-netjer.update', $staff_netjer) }}" class="bg-white p-6 rounded shadow">

        @csrf
        @method('PUT')

        @include('admin.staff-netjer._form', [
            'staff_netjer' => $staff_netjer,
        ])

        <div class="mt-6">

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Actualizar
            </button>

            <a href="{{ route('admin.staff-netjer.index') }}" class="ml-3 text-gray-600 hover:underline">
                Cancelar
            </a>

        </div>

    </form>

@endsection
