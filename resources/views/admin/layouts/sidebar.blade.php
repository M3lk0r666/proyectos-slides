@php
    $activePresentationId = session('active_presentation');
    $activePresentation = null;

    if ($activePresentationId) {
        $activePresentation = \App\Models\Presentation::find($activePresentationId);
    }
@endphp

<aside class="w-64 bg-gray-900 text-white min-h-screen p-4">
    <h2 class="text-lg font-semibold mb-6">
        Panel
    </h2>
    {{-- PRESENTACIONES --}}
    <div class="mb-8">
        <p class="text-gray-400 text-xs uppercase mb-2">
            Presentaciones
        </p>
        <a href="{{ route('admin.presentations.index') }}" class="block px-3 py-2 rounded hover:bg-gray-700">
            Lista de presentaciones
        </a>
    </div>
    {{-- PRESENTACIÓN ACTIVA --}}
    @if ($activePresentation)
        <div class="mb-8">
            <p class="text-gray-400 text-xs uppercase mb-2">
                Presentación activa
            </p>
            <div class="bg-gray-800 p-3 rounded text-sm">
                <div class="font-semibold">
                    {{ $activePresentation->titulo }}
                </div>
                <div class="text-gray-400 text-xs">
                    {{ $activePresentation->periodo }}
                </div>
            </div>
            <a href="{{ route('admin.presentations.index') }}" class="block mt-2 text-xs text-blue-400 hover:underline">
                Cambiar presentación
            </a>
        </div>
        {{-- EDITOR --}}
        <div>
            <p class="text-gray-400 text-xs uppercase mb-2">
                Editor
            </p>
            <a href="{{ route('admin.presentations.editor', $activePresentation->id) }}"
                class="block px-3 py-2 rounded hover:bg-gray-700">
                Editor general
            </a>
            <a href="{{ route('admin.projects.index') }}"
                class="{{ request()->routeIs('admin.projects.*') ? 'bg-gray-700' : '' }} block px-3 py-2 rounded hover:bg-gray-700">
                Proyectos
            </a>
            <a href="{{ route('admin.activities.index') }}"
                class="{{ request()->routeIs('admin.activities.*') ? 'bg-gray-700' : '' }} block px-3 py-2 rounded hover:bg-gray-700">
                Actividades
            </a>
            <a href="{{ route('admin.key-points.index') }}"
                class="{{ request()->routeIs('admin.key-points.*') ? 'bg-gray-700' : '' }} block px-3 py-2 rounded hover:bg-gray-700">
                Puntos clave
            </a>
            <a href="{{ route('admin.missing-items.index') }}"
                class="{{ request()->routeIs('admin.missing-items.*') ? 'bg-gray-700' : '' }} block px-3 py-2 rounded hover:bg-gray-700">
                Faltantes
            </a>
            <a href="{{ route('admin.staff-netjer.index') }}"
                class="{{ request()->routeIs('admin.staff-netjer.*') ? 'bg-gray-700' : '' }} block px-3 py-2 rounded hover:bg-gray-700">
                Personal Netjer
            </a>
            <a href="{{ route('admin.client-contacts.index') }}"
                class="{{ request()->routeIs('admin.client-contacts.*') ? 'bg-gray-700' : '' }} block px-3 py-2 rounded hover:bg-gray-700">
                Responsables Cliente
            </a>
            <a href="{{ route('admin.ticket-agents.index') }}"
                class="{{ request()->routeIs('admin.ticket-agents.*') ? 'bg-gray-700' : '' }} block px-3 py-2 rounded hover:bg-gray-700">
                Tickets Agentes
            </a>
            <a href="{{ route('admin.agent-tickets.index') }}"
                class="{{ request()->routeIs('admin.agent-tickets.*') ? 'bg-gray-700' : '' }} block px-3 py-2 rounded hover:bg-gray-700">
                Tickets Items
            </a>
            <a href="{{ route('admin.reports.index') }}"
                class="{{ request()->routeIs('admin.reports.*') ? 'bg-gray-700' : '' }} block px-3 py-2 rounded hover:bg-gray-700">
                Reportes
            </a>
        </div>
    @endif
</aside>
