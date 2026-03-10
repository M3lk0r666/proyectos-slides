<div class="mt-4 grid grid-cols-2 gap-4">
    {{-- ACTIVIDADES --}}
    {{-- <div>
        <h4 class="font-semibold mb-2">Actividades</h4>
        <a href="{{ route('admin.activities.create', [
            'project_id' => $project->id,
        ]) }}"
            class="text-blue-600 text-sm">
            + agregar actividad
        </a>
        <ul class="text-sm mt-2 space-y-1">
            @foreach ($project->activities as $activity)
                <li>
                    {{ $activity->item }}. {{ $activity->tema }}
                </li>
            @endforeach
        </ul>
    </div> --}}
    {{-- ACTIVIDADES --}}
    @include('admin.editor.project-activities', ['project' => $project])
    {{-- PUNTOS CLAVE --}}
    {{-- <div>
        <h4 class="font-semibold mb-2">Puntos clave</h4>
        <a href="{{ route('admin.key-points.create', [
            'project_id' => $project->id,
        ]) }}"
            class="text-blue-600 text-sm">
            + agregar punto
        </a>
        <ul class="text-sm mt-2 space-y-1">
            @foreach ($project->keyPoints as $point)
                <li>
                    {{ $point->descripcion }}
                </li>
            @endforeach
        </ul>
    </div> --}}
    {{-- PUNTOS CLAVE --}}
    @include('admin.editor.project-keypoints', ['project' => $project])

    {{-- FALTANTES --}}
    @include('admin.editor.project-missing', ['project' => $project])

    {{-- PERSONAL NETJER --}}
    @include('admin.editor.project-staff', ['project' => $project])

    {{-- RESPONSABLE CLIENTE --}}
    @include('admin.editor.project-client', ['project' => $project])

</div>
