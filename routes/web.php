<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\Admin\PresentationController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\KeyPointController;
use App\Http\Controllers\Admin\MissingItemController;
use App\Http\Controllers\Admin\StaffNetjerController;
use App\Http\Controllers\Admin\ClientContactController;
use App\Http\Controllers\Admin\TicketGlobalAgentController;
use App\Http\Controllers\Admin\TicketAgentItemController;
use App\Http\Controllers\Admin\ReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/presentaciones/{slug}', [PresentacionController::class, 'show'])->name('presentaciones.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('presentations', PresentationController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('activities', ActivityController::class);
    Route::resource('key-points', KeyPointController::class)->except(['show']);
    Route::resource('missing-items', MissingItemController::class)->except(['show']);
    Route::resource('staff-netjer', StaffNetjerController::class)->except(['show']);
    Route::resource('client-contacts', ClientContactController::class)->except(['show']);
    Route::resource('ticket-agents', TicketGlobalAgentController::class)->except(['show']);
    Route::resource('agent-tickets', TicketAgentItemController::class)->except(['show']);
    Route::resource('reports', ReportController::class)->except(['show']);

    Route::get('projects/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'show'])->name('projects.show');
    Route::get('/presentations/{presentation}/editor', [PresentationController::class, 'editor'])->name('presentations.editor');
});

