<div class="space-y-4">

    <div>
        <label class="font-semibold">Proyecto</label>

        <select name="project_id" class="w-full border rounded px-3 py-2">

            @foreach ($projects as $p)
                <option value="{{ $p->id }}" @selected(old('project_id', $staff_netjer->project_id ?? '') == $p->id)>
                    {{ $p->nombre }}
                </option>
            @endforeach

        </select>
    </div>

    <div>
        <label class="font-semibold">Nombre</label>

        <input name="nombre" value="{{ old('nombre', $staff_netjer->nombre ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="font-semibold">Rol</label>

        <input name="rol" value="{{ old('rol', $staff_netjer->rol ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

</div>
