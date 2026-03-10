<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\MissingItem;
use Illuminate\Http\Request;

class MissingItemController extends Controller
{
    public function index()
    {
        $items = MissingItem::with('project')->latest()->get();
        return view('admin.missing-items.index', compact('items'));
    }

    public function create()
    {
        $projects = Project::orderBy('nombre')->get();
        return view('admin.missing-items.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'descripcion' => 'required|string|max:255',
        ]);

        MissingItem::create($data);

        return redirect()->route('admin.missing-items.index')
            ->with('success', 'Faltante agregado');
    }

    public function edit(MissingItem $missing_item)
    {
        $projects = Project::orderBy('nombre')->get();
        return view('admin.missing-items.edit', compact('missing_item', 'projects'));
    }

    public function update(Request $request, MissingItem $missing_item)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'descripcion' => 'required|string|max:255',
        ]);

        $missing_item->update($data);

        return redirect()->route('admin.missing-items.index')
            ->with('success', 'Faltante actualizado');
    }

    public function destroy(MissingItem $missing_item)
    {
        $missing_item->delete();
        return back()->with('success', 'Faltante eliminado');
    }
}