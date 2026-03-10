<div>

    <div class="flex justify-between mb-2">

        <h4 class="font-semibold">
            Responsables Cliente
        </h4>

        <a href="{{ route('admin.client-contacts.create', [
            'project_id' => $project->id,
        ]) }}"
            class="text-blue-600 text-sm">
            + agregar
        </a>

    </div>

    <ul class="text-sm space-y-1">

        @foreach ($project->clientContacts as $contact)
            <li class="flex justify-between">

                <span>
                    {{ $contact->nombre }}
                </span>

                <span class="text-gray-500">
                    {{ $contact->puesto }}
                </span>

            </li>
        @endforeach

    </ul>

</div>
