<div class="space-y-4">

    <div>
        <label class="font-semibold">Agente</label>

        <select name="ticket_global_agent_id" class="w-full border rounded px-3 py-2">

            @foreach ($agents as $agent)
                <option value="{{ $agent->id }}" @selected(old('ticket_global_agent_id', $agent_ticket->ticket_global_agent_id ?? '') == $agent->id)>
                    {{ $agent->agente_nombre }}
                </option>
            @endforeach

        </select>

    </div>

    <div>
        <label>Solicitante</label>
        <input name="solicitante" value="{{ old('solicitante', $agent_ticket->solicitante ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label>Asunto</label>
        <input name="asunto" value="{{ old('asunto', $agent_ticket->asunto ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label>Ticket</label>
        <input name="ticket_codigo" value="{{ old('ticket_codigo', $agent_ticket->ticket_codigo ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label>Estatus</label>
        <input name="estatus" value="{{ old('estatus', $agent_ticket->estatus ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label>Responsable</label>
        <input name="responsable" value="{{ old('responsable', $agent_ticket->responsable ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

</div>
