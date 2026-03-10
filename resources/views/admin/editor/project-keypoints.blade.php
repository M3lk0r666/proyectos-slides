<div>
    <div class="flex justify-between mb-2">
        <h4 class="font-semibold mb-2">Puntos clave</h4>
        <a href="{{ route('admin.key-points.create', [
            'project_id' => $project->id,
        ]) }}"
            class="text-blue-600 text-sm">
            + agregar punto
        </a>
    </div>
    <ul class="text-sm mt-2 space-y-1">
        @foreach ($project->keyPoints as $point)
            <li>
                {{ $point->descripcion }}
            <li>
        @endforeach
    </ul>

</div>
