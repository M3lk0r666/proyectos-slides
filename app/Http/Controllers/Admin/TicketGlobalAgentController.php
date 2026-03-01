namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketGlobalAgent;
use App\Models\Presentation;
use Illuminate\Http\Request;

class TicketGlobalAgentController extends Controller
{
    public function index()
    {
        $agents = TicketGlobalAgent::with('presentation')->get();
        return view('admin.ticket-agents.index', compact('agents'));
    }

    public function create()
    {
        $presentations = Presentation::orderBy('titulo')->get();
        return view('admin.ticket-agents.create', compact('presentations'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'presentation_id' => 'required|exists:presentations,id',
            'agente_nombre' => 'required|string|max:255',
            'asignados' => 'required|integer',
            'cerrados' => 'required|integer',
            'primera_respuesta' => 'required|integer',
            'espera_cliente' => 'required|integer',
            'en_curso' => 'required|integer',
            'pendiente' => 'required|integer',
        ]);

        TicketGlobalAgent::create($data);

        return redirect()->route('admin.ticket-agents.index')
            ->with('success', 'Agente creado');
    }

    public function edit(TicketGlobalAgent $ticket_agent)
    {
        $presentations = Presentation::orderBy('titulo')->get();
        return view('admin.ticket-agents.edit', compact('ticket_agent', 'presentations'));
    }

    public function update(Request $request, TicketGlobalAgent $ticket_agent)
    {
        $data = $request->validate([
            'presentation_id' => 'required|exists:presentations,id',
            'agente_nombre' => 'required|string|max:255',
            'asignados' => 'required|integer',
            'cerrados' => 'required|integer',
            'primera_respuesta' => 'required|integer',
            'espera_cliente' => 'required|integer',
            'en_curso' => 'required|integer',
            'pendiente' => 'required|integer',
        ]);

        $ticket_agent->update($data);

        return redirect()->route('admin.ticket-agents.index')
            ->with('success', 'Agente actualizado');
    }

    public function destroy(TicketGlobalAgent $ticket_agent)
    {
        $ticket_agent->delete();
        return back()->with('success', 'Agente eliminado');
    }
}