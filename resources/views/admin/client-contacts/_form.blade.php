<div class="space-y-4">
    <div>
        <label class="font-semibold">Proyecto</label>
        <select name="project_id" class="w-full border rounded px-3 py-2">
            @foreach($projects as $p)
                <option value="{{ $p->id }}"
                    @selected(old('project_id', $client_contact->project_id ?? '') == $p->id)>
                    {{ $p->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="font-semibold">Nombre</label>
        <input name="nombre"
               value="{{ old('nombre', $client_contact->nombre ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="font-semibold">Puesto</label>
        <input name="puesto"
               value="{{ old('puesto', $client_contact->puesto ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>
</div>