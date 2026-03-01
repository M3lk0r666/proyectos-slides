@extends('admin.layouts.app')

@section('title', 'Nueva presentación')

@section('content')
<h1 class="text-2xl font-bold mb-6">Nueva presentación</h1>

<form method="POST" action="{{ route('admin.presentations.store') }}" class="bg-white p-6 rounded shadow">
    @csrf
    @include('admin.presentations._form')

    <div class="mt-6">
        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Guardar
        </button>
    </div>
</form>
@endsection