namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ClientContact;
use Illuminate\Http\Request;

class ClientContactController extends Controller
{
    public function index()
    {
        $items = ClientContact::with('project')->latest()->get();
        return view('admin.client-contacts.index', compact('items'));
    }

    public function create()
    {
        $projects = Project::orderBy('nombre')->get();
        return view('admin.client-contacts.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'nombre' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
        ]);

        ClientContact::create($data);

        return redirect()->route('admin.client-contacts.index')
            ->with('success', 'Responsable del cliente agregado');
    }

    public function edit(ClientContact $client_contact)
    {
        $projects = Project::orderBy('nombre')->get();
        return view('admin.client-contacts.edit', compact('client_contact', 'projects'));
    }

    public function update(Request $request, ClientContact $client_contact)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'nombre' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
        ]);

        $client_contact->update($data);

        return redirect()->route('admin.client-contacts.index')
            ->with('success', 'Responsable del cliente actualizado');
    }

    public function destroy(ClientContact $client_contact)
    {
        $client_contact->delete();
        return back()->with('success', 'Responsable del cliente eliminado');
    }
}