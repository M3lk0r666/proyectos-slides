<div class="space-y-4">

    <div>
        <label class="font-semibold">Presentación</label>

        <select name="presentation_id" class="w-full border rounded px-3 py-2">

            @foreach ($presentations as $p)
                <option value="{{ $p->id }}" @selected(old('presentation_id', $ticket_agent->presentation_id ?? '') == $p->id)>
                    {{ $p->titulo }}
                </option>
            @endforeach

        </select>
    </div>

    <div>
        <label class="font-semibold">Nombre del agente</label>

        <input name="agente_nombre" value="{{ old('agente_nombre', $ticket_agent->agente_nombre ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <div class="grid grid-cols-3 gap-4">

        <div>
            <label>Asignados</label>
            <input type="number" name="asignados" value="{{ old('asignados', $ticket_agent->asignados ?? 0) }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Cerrados</label>
            <input type="number" name="cerrados" value="{{ old('cerrados', $ticket_agent->cerrados ?? 0) }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Primera respuesta</label>
            <input type="number" name="primera_respuesta"
                value="{{ old('primera_respuesta', $ticket_agent->primera_respuesta ?? 0) }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Espera cliente</label>
            <input type="number" name="espera_cliente"
                value="{{ old('espera_cliente', $ticket_agent->espera_cliente ?? 0) }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>En curso</label>
            <input type="number" name="en_curso" value="{{ old('en_curso', $ticket_agent->en_curso ?? 0) }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Pendiente</label>
            <input type="number" name="pendiente" value="{{ old('pendiente', $ticket_agent->pendiente ?? 0) }}"
                class="w-full border rounded px-3 py-2">
        </div>

    </div>

</div>
