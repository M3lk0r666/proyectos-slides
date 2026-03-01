<div class="space-y-4">
    <div>
        <label class="font-semibold">Proyecto</label>
        <select name="project_id" class="w-full border rounded px-3 py-2">
            @foreach($projects as $p)
                <option value="{{ $p->id }}"
                    @selected(old('project_id', $key_point->project_id ?? '') == $p->id)>
                    {{ $p->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="font-semibold">Descripción</label>
        <input name="descripcion"
               value="{{ old('descripcion', $key_point->descripcion ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="font-semibold">Orden</label>
        <input type="number" name="orden"
               value="{{ old('orden', $key_point->orden ?? 0) }}"
               class="w-full border rounded px-3 py-2">
    </div>
</div>