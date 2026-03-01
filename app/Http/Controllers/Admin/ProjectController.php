namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Presentation;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('presentation')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $presentations = Presentation::orderBy('titulo')->get();

        return view('admin.projects.create', compact('presentations'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'presentation_id' => 'required|exists:presentations,id',
            'cliente_nombre' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'tecnologia' => 'required|string|max:255',
            'estatus_label' => 'required|string|max:100',
            'estatus_color' => 'required|string|max:50',
            'fecha_programada' => 'nullable|date',
            'horario' => 'nullable|string|max:100',
        ]);

        Project::create($data);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Proyecto creado correctamente');
    }

    public function show(Project $project)
    {
        $project->load([
            'presentation',
            'activities',
            'keyPoints',
            'missingItems',
            'staffNetjer',
            'clientContacts',
        ]);

        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $presentations = Presentation::orderBy('titulo')->get();

        return view('admin.projects.edit', compact('project', 'presentations'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'presentation_id' => 'required|exists:presentations,id',
            'cliente_nombre' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'tecnologia' => 'required|string|max:255',
            'estatus_label' => 'required|string|max:100',
            'estatus_color' => 'required|string|max:50',
            'fecha_programada' => 'nullable|date',
            'horario' => 'nullable|string|max:100',
        ]);

        $project->update($data);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Proyecto actualizado correctamente');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return back()->with('success', 'Proyecto eliminado');
    }
}