<div class="space-y-4">

    <div>
        <label class="font-semibold">Presentación</label>
        <select name="presentation_id" class="w-full border rounded px-3 py-2">
            @foreach($presentations as $p)
                <option value="{{ $p->id }}"
                    @selected(old('presentation_id', $report->presentation_id ?? '') == $p->id)>
                    {{ $p->titulo }} ({{ $p->periodo }})
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="font-semibold">Cliente</label>
        <input name="cliente"
               value="{{ old('cliente', $report->cliente ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="font-semibold">Responsable elaboración</label>
        <input name="responsable_elaboracion"
               value="{{ old('responsable_elaboracion', $report->responsable_elaboracion ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div class="grid grid-cols-3 gap-4">
        <div>
            <label class="font-semibold">Revisión interna</label>
            <input type="date" name="fecha_revision_interna"
                   value="{{ old('fecha_revision_interna', optional($report->fecha_revision_interna ?? null)->format('Y-m-d')) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="font-semibold">Entrega cliente</label>
            <input type="date" name="fecha_entrega_cliente"
                   value="{{ old('fecha_entrega_cliente', optional($report->fecha_entrega_cliente ?? null)->format('Y-m-d')) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="font-semibold">Revisión cliente</label>
            <input type="date" name="fecha_revision_cliente"
                   value="{{ old('fecha_revision_cliente', optional($report->fecha_revision_cliente ?? null)->format('Y-m-d')) }}"
                   class="w-full border rounded px-3 py-2">
        </div>
    </div>

    <div>
        <label class="font-semibold">Responsable sesión</label>
        <input name="responsable_sesion"
               value="{{ old('responsable_sesion', $report->responsable_sesion ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>

</div>