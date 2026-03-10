<div class="space-y-4">

    <div>
        <label class="font-semibold">Presentación</label>
        <select name="presentation_id" class="w-full border rounded px-3 py-2">
            @foreach ($presentations as $p)
                <option value="{{ $p->id }}" @selected(old('presentation_id', $project->presentation_id ?? '') == $p->id)>
                    {{ $p->titulo }} ({{ $p->periodo }})
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="font-semibold">Cliente</label>
        <input name="cliente_nombre" value="{{ old('cliente_nombre', $project->cliente_nombre ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="font-semibold">Logo del cliente</label>

        <input type="file" name="cliente_logo" accept="image/*" class="w-full border rounded px-3 py-2">
    </div>

    @if (!empty($project->cliente_logo_path))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $project->cliente_logo_path) }}" class="h-12">
        </div>
    @endif

    <div>
        <label class="font-semibold">Nombre del Proyecto</label>
        <input name="nombre" value="{{ old('nombre', $project->nombre ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="font-semibold">Tecnología</label>
        <input name="tecnologia" value="{{ old('tecnologia', $project->tecnologia ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="font-semibold">Estatus</label>
            <input name="estatus_label" value="{{ old('estatus_label', $project->estatus_label ?? '') }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="font-semibold">Color Estatus</label>
            <input name="estatus_color" value="{{ old('estatus_color', $project->estatus_color ?? '') }}"
                class="w-full border rounded px-3 py-2">
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="font-semibold">Fecha Programada</label>
            <input type="date" name="fecha_programada"
                value="{{ old('fecha_programada', optional($project->fecha_programada ?? null)->format('Y-m-d')) }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="font-semibold">Horario</label>
            <input name="horario" value="{{ old('horario', $project->horario ?? '') }}"
                class="w-full border rounded px-3 py-2">
        </div>
    </div>

</div>
