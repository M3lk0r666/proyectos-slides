<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresentacionController extends Controller
{
    public function show(string $slug)
    {
        /* $path = storage_path("app/presentaciones/{$slug}.json");
        abort_unless(file_exists($path), 404);
        $data = json_decode(file_get_contents($path), true);
        return view('presentaciones.show', compact('data')); */

        $data = app(\App\Services\PresentationService::class)->get($slug);
        return view('presentaciones.show', compact('data'));
    }
}
