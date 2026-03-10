<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\KeyPoint;
use Illuminate\Http\Request;

class KeyPointController extends Controller
{
    public function index()
    {
        $items = KeyPoint::with('project')->orderBy('orden')->get();
        //return $items;
        return view('admin.key-points.index', compact('items'));
    }

    public function create()
    {
        $projects = Project::orderBy('nombre')->get();
        return view('admin.key-points.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'descripcion' => 'required|string|max:255',
            'orden' => 'nullable|integer',
        ]);

        KeyPoint::create($data);

        return redirect()->route('admin.key-points.index')
            ->with('success', 'Punto clave agregado');
    }

    public function edit(KeyPoint $key_point)
    {
        $projects = Project::orderBy('nombre')->get();
        return view('admin.key-points.edit', compact('key_point', 'projects'));
    }

    public function update(Request $request, KeyPoint $key_point)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'descripcion' => 'required|string|max:255',
            'orden' => 'nullable|integer',
        ]);

        $key_point->update($data);

        return redirect()->route('admin.key-points.index')
            ->with('success', 'Punto clave actualizado');
    }

    public function destroy(ProjectKeyPoint $key_point)
    {
        $key_point->delete();
        return back()->with('success', 'Punto clave eliminado');
    }
}