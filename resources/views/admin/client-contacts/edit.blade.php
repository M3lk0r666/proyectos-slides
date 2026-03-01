@extends('admin.layouts.app')

@section('title', 'Nueva actividad')

@section('content')
<h1 class="text-2xl font-bold mb-6">Nueva actividad</h1>

<form method="POST" action="{{ route('admin.activities.store') }}"
      class="bg-white p-6 rounded shadow">
    @csrf
    @method('PUT')
    @include('admin.activities._form')
    <button class="mt-6 bg-blue-600 text-white px-4 py-2 rounded">
        Guardar
    </button>
</form>
@endsection