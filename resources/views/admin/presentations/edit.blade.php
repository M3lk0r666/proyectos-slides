@extends('admin.layouts.app')

@section('title', 'Editar presentación')

@section('content')
<h1 class="text-2xl font-bold mb-6">Editar presentación</h1>

<form method="POST"
      action="{{ route('admin.presentations.update', $presentation) }}"
      class="bg-white p-6 rounded shadow">
    @csrf
    @method('PUT')

    @include('admin.presentations._form', ['presentation' => $presentation])

    <div class="mt-6">
        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Actualizar
        </button>
    </div>
</form>
@endsection