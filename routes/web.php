<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\Admin\PresentationController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ActivitiesController;
use App\Http\Controllers\Admin\KeyPointController;
use App\Http\Controllers\Admin\MissingItemController;
use App\Http\Controllers\Admin\StaffNetjerController;
use App\Http\Controllers\Admin\ClientContactController;
use App\Http\Controllers\Admin\TicketGlobalAgentController;
use App\Http\Controllers\Admin\TicketAgentItemController;

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::redirect('/','/');


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

Route::prefix('admin')->group(function () {

    Route::resource('presentations', \App\Http\Controllers\Admin\PresentationController::class);
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('activities', \App\Http\Controllers\Admin\ActivityController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('key-points', KeyPointController::class)->except(['show']);
    Route::resource('missing-items', MissingItemController::class)->except(['show']);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('staff-netjer', ProjectStaffNetjerController::class)->except(['show']);
    Route::resource('client-contacts', ProjectClientContactController::class)->except(['show']);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('ticket-agents', TicketGlobalAgentController::class)->except(['show']);
    Route::resource('agent-tickets', TicketAgentItemController::class)->except(['show']);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('reports', ReportController::class)->except(['show']);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('projects/{project}', 
        [\App\Http\Controllers\Admin\ProjectController::class, 'show']
    )->name('projects.show');
});
