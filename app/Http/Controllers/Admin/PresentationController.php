<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Presentation;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presentations = Presentation::latest()->get();
        return view('admin.presentations.index', compact('presentations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.presentations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'slug' => 'required|string|max:255|unique:presentations,slug',
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'periodo' => 'required|string|max:100',
            'logo_path' => 'nullable|string|max:255',
        ]);

        Presentation::create($data);

        return redirect()
            ->route('admin.presentations.index')
            ->with('success', 'Presentación creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presentation $presentation)
    {
        return view('admin.presentations.edit', compact('presentation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presentation $presentation)
    {
        $data = $request->validate([
            'slug' => 'required|string|max:255|unique:presentations,slug,' . $presentation->id,
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'periodo' => 'required|string|max:100',
            'logo_path' => 'nullable|string|max:255',
        ]);

        $presentation->update($data);

        return redirect()
            ->route('admin.presentations.index')
            ->with('success', 'Presentación actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presentation $presentation)
    {
        return redirect()
            ->route('admin.presentations.index')
            ->with('success', 'Presentación eliminada');
    }
}
