<div>

    <div class="flex justify-between mb-2">

        <h4 class="font-semibold">
            Personal Netjer
        </h4>

        <a href="{{ route('admin.staff-netjer.create', [
            'project_id' => $project->id,
        ]) }}"
            class="text-blue-600 text-sm">
            + agregar
        </a>

    </div>

    <ul class="text-sm space-y-1">

        @foreach ($project->staffNetjer as $staff)
            <li class="flex justify-between">

                <span>
                    {{ $staff->nombre }}
                </span>

                <span class="text-gray-500">
                    {{ $staff->rol }}
                </span>

            </li>
        @endforeach

    </ul>

</div>
