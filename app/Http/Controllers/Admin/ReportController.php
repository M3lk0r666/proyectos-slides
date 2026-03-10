<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Presentation;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('presentation')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.reports.index', compact('reports'));
    }

    public function create()
    {
        $presentations = Presentation::orderBy('titulo')->get();
        return view('admin.reports.create', compact('presentations'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'presentation_id' => 'required|exists:presentations,id',
            'item' => 'required|integer',
            'cliente' => 'required|string|max:255',
            'responsable_elaboracion' => 'required|string|max:255',
            'fecha_revision_interna' => 'nullable|date',
            'fecha_entrega_cliente' => 'nullable|date',
            'fecha_revision_cliente' => 'nullable|date',
            'responsable_sesion' => 'required|string|max:255',
        ]);

        Report::create($data);

        return redirect()
            ->route('admin.reports.index')
            ->with('success', 'Reporte creado correctamente');
    }

    public function edit(Report $report)
    {
        $presentations = Presentation::orderBy('titulo')->get();
        return view('admin.reports.edit', compact('report', 'presentations'));
    }

    public function update(Request $request, Report $report)
    {
        $data = $request->validate([
            'presentation_id' => 'required|exists:presentations,id',
            'item' => 'required|integer',
            'cliente' => 'required|string|max:255',
            'responsable_elaboracion' => 'required|string|max:255',
            'fecha_revision_interna' => 'nullable|date',
            'fecha_entrega_cliente' => 'nullable|date',
            'fecha_revision_cliente' => 'nullable|date',
            'responsable_sesion' => 'required|string|max:255',
        ]);

        $report->update($data);

        return redirect()
            ->route('admin.reports.index')
            ->with('success', 'Reporte actualizado correctamente');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return back()->with('success', 'Reporte eliminado');
    }
}