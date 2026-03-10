{{-- <ul class="space-y-1 text-sm">
    @foreach ($project->activities as $activity)
        <li x-data="activityEditor({{ $activity->id }}, '{{ addslashes($activity->tema) }}')" class="flex items-center gap-2">
            <span class="text-gray-500">
                {{ $activity->item }}.
            </span>
            <x-wire-input x-model="tema" @blur="save" class="border rounded px-2 py-1 w-full text-sm" />
        </li>
    @endforeach
</ul> --}}
<div>
    <div class="flex justify-between mb-2">
        <h4 class="font-semibold mb-2">Actividades ({{ $project->activities->count() }})</h4>
        <a href="{{ route('admin.activities.create', [
            'project_id' => $project->id,
        ]) }}"
            class="text-blue-600 text-sm">
            + agregar actividad
        </a>
    </div>
    <ul class="space-y-1 text-sm">
        @foreach ($project->activities as $activity)
            <li x-data="activityEditor({{ $activity->id }}, '{{ addslashes($activity->tema) }}')" class="flex items-center gap-2">
                <span class="text-gray-400">
                    {{ $activity->item }}.
                </span>
                {{-- <x-wire-input x-model="tema" @blur="save" class="border rounded px-2 py-1 w-full text-sm" /> --}}
                <div class="flex items-center gap-2">
                    <input x-model="tema" @blur="save" class="border rounded px-2 py-1 w-full text-sm" />
                    <span x-show="saved" class="text-green-600 text-xs">
                        ✔ guardado
                    </span>
                </div>
            </li>
        @endforeach
    </ul>
</div>
