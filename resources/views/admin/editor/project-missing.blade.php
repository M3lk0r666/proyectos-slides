<div>

    <div class="flex justify-between mb-2">

        <h4 class="font-semibold">
            Faltantes
        </h4>

        <a href="{{ route('admin.missing-items.create', [
            'project_id' => $project->id,
        ]) }}"
            class="text-blue-600 text-sm">
            + agregar
        </a>

    </div>

    <ul class="text-sm space-y-1">

        @foreach ($project->missingItems as $missing)
            <li>
                {{ $missing->descripcion }}
            </li>
        @endforeach

    </ul>

</div>
