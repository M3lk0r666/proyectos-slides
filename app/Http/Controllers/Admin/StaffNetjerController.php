namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\StaffNetjer;
use Illuminate\Http\Request;

class StaffNetjerController extends Controller
{
    public function index()
    {
        $items = StaffNetjer::with('project')->latest()->get();
        return view('admin.staff-netjer.index', compact('items'));
    }

    public function create()
    {
        $projects = Project::orderBy('nombre')->get();
        return view('admin.staff-netjer.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'nombre' => 'required|string|max:255',
            'rol' => 'required|string|max:255',
        ]);

        StaffNetjer::create($data);

        return redirect()->route('admin.staff-netjer.index')
            ->with('success', 'Personal Netjer agregado');
    }

    public function edit(StaffNetjer $staff_netjer)
    {
        $projects = Project::orderBy('nombre')->get();
        return view('admin.staff-netjer.edit', compact('staff_netjer', 'projects'));
    }

    public function update(Request $request, StaffNetjer $staff_netjer)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'nombre' => 'required|string|max:255',
            'rol' => 'required|string|max:255',
        ]);

        $staff_netjer->update($data);

        return redirect()->route('admin.staff-netjer.index')
            ->with('success', 'Personal Netjer actualizado');
    }

    public function destroy(StaffNetjer $staff_netjer)
    {
        $staff_netjer->delete();
        return back()->with('success', 'Personal Netjer eliminado');
    }
}