<div class="space-y-4">

    <div>
        <label class="font-semibold">Proyecto</label>
        <select name="project_id" class="w-full border rounded px-3 py-2">
            @foreach($projects as $p)
                <option value="{{ $p->id }}"
                    @selected(old('project_id', $activity->project_id ?? '') == $p->id)>
                    {{ $p->nombre }} — {{ $p->cliente_nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="font-semibold">Item</label>
            <input type="number" name="item"
                   value="{{ old('item', $activity->item ?? '') }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="font-semibold">Estado</label>
            <input name="estado"
                   value="{{ old('estado', $activity->estado ?? '') }}"
                   class="w-full border rounded px-3 py-2">
        </div>
    </div>

    <div>
        <label class="font-semibold">Tema / Actividad</label>
        <input name="tema"
               value="{{ old('tema', $activity->tema ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="font-semibold">Descripción / Ticket</label>
        <input name="descripcion"
               value="{{ old('descripcion', $activity->descripcion ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="font-semibold">Fecha límite</label>
            <input type="date" name="dateline"
                   value="{{ old('dateline', optional($activity->dateline ?? null)->format('Y-m-d')) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="font-semibold">Responsable</label>
            <input name="responsable"
                   value="{{ old('responsable', $activity->responsable ?? '') }}"
                   class="w-full border rounded px-3 py-2">
        </div>
    </div>

    <div>
        <label class="font-semibold">Comentarios</label>
        <textarea name="comentarios"
                  class="w-full border rounded px-3 py-2"
                  rows="3">{{ old('comentarios', $activity->comentarios ?? '') }}</textarea>
    </div>

</div>