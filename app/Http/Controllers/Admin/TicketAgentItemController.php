<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketAgentItem;
use App\Models\TicketGlobalAgent;
use Illuminate\Http\Request;

class TicketAgentItemController extends Controller
{
    public function index()
    {
        $tickets = TicketAgentItem::with('globalAgent')->get();
        return view('admin.agent-tickets.index', compact('tickets'));
    }

    public function create()
    {
        $agents = TicketGlobalAgent::orderBy('agente_nombre')->get();
        return view('admin.agent-tickets.create', compact('agents'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ticket_global_agent_id' => 'required|exists:ticket_global_agents,id',
            'solicitante' => 'required|string|max:255',
            'asunto' => 'required|string|max:255',
            'ticket_codigo' => 'required|string|max:100',
            'estatus' => 'required|string|max:100',
            'responsable' => 'required|string|max:255',
        ]);

        TicketAgentItem::create($data);

        return redirect()->route('admin.agent-tickets.index')
            ->with('success', 'Ticket creado');
    }

    public function edit(TicketAgentItem $agent_ticket)
    {
        $agents = TicketGlobalAgent::orderBy('agente_nombre')->get();
        return view('admin.agent-tickets.edit', compact('agent_ticket', 'agents'));
    }

    public function update(Request $request, TicketAgentItem $agent_ticket)
    {
        $data = $request->validate([
            'ticket_global_agent_id' => 'required|exists:ticket_global_agents,id',
            'solicitante' => 'required|string|max:255',
            'asunto' => 'required|string|max:255',
            'ticket_codigo' => 'required|string|max:100',
            'estatus' => 'required|string|max:100',
            'responsable' => 'required|string|max:255',
        ]);

        $agent_ticket->update($data);

        return redirect()->route('admin.agent-tickets.index')
            ->with('success', 'Ticket actualizado');
    }

    public function destroy(TicketAgentItem $agent_ticket)
    {
        $agent_ticket->delete();
        return back()->with('success', 'Ticket eliminado');
    }
}