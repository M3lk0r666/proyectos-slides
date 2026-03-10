<h2 class="text-xl font-semibold mb-4">
    Proyectos
</h2>

<a href="{{ route('admin.projects.create', [
    'presentation_id' => $presentation->id,
]) }}"
    class="bg-blue-600 text-white px-3 py-1 rounded">
    Nuevo Proyecto
</a>

@foreach ($presentation->projects as $project)
    <div class="bg-white shadow rounded p-4 mt-4">
        <div class="flex justify-between">
            <h3 class="font-semibold">
                {{ $project->nombre }}
            </h3>
            <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 text-sm">
                Editar
            </a>
        </div>

        {{-- ACTIVIDADES --}}
        <div class="mt-3">
            <h4 class="font-medium">Actividades</h4>
            <a href="{{ route('admin.activities.create', [
                'project_id' => $project->id,
            ]) }}"
                class="text-sm text-blue-600">
                Agregar actividad
            </a>
        </div>
    </div>
@endforeach
