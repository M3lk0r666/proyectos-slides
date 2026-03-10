<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Project;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::with('project')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {
        $projects = Project::orderBy('nombre')->get();

        return view('admin.activities.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'item' => 'nullable|integer',
            'tema' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'estado' => 'required|string|max:100',
            'dateline' => 'nullable|date',
            'comentarios' => 'nullable|string|max:500',
            'responsable' => 'nullable|string|max:255',
        ]);

        Activity::create($data);

        return redirect()
            ->route('admin.activities.index')
            ->with('success', 'Actividad creada correctamente');
    }

    public function edit(Activity $activity)
    {
        $projects = Project::orderBy('nombre')->get();

        return view('admin.activities.edit', compact('activity', 'projects'));
    }

    public function update(Request $request, Activity $activity)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'item' => 'nullable|integer',
            'tema' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'estado' => 'required|string|max:100',
            'dateline' => 'nullable|date',
            'comentarios' => 'nullable|string|max:500',
            'responsable' => 'nullable|string|max:255',
        ]);

        $activity->update($data);

        
    if($request->expectsJson()){
        return response()->json(['ok'=>true]);
    }

    return redirect()->back();

        /* return redirect()
            ->route('admin.activities.index')
            ->with('success', 'Actividad actualizada correctamente'); */
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();

        return back()->with('success', 'Actividad eliminada');
    }
}