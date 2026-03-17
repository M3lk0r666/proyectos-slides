<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presentation;
use App\Services\PresentationService;

class PresentacionController extends Controller
{
    /* public function show(string $slug)
    {
        $data = app(\App\Services\PresentationService::class)->get($slug);
        return view('presentaciones.show', compact('data'));
    } */
    
    protected $presentationService;

    public function __construct(PresentationService $presentationService)
    {
        $this->presentationService = $presentationService;
    }

    public function show($slug)
    {

        $presentation = Presentation::where('slug', $slug)->firstOrFail();

        $presentation->load([
            'projects.activities',
            'projects.keyPoints',
            'projects.missingItems',
            'projects.staffNetjer',
            'projects.clientContacts',
            'reports',
            'ticketAgents.items'
        ]);

        $data = $this->presentationService->build($presentation);

        //dd($data);

        return view('presentaciones.show', [
            'data' => $data
        ]);
    }
}
