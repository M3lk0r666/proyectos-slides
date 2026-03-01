{{-- <x-layouts.reveal>

    @isset($data['portada'])
        @include('modules.portada', ['portada' => $data['portada']])
    @endisset

    @isset($data['actividades'])
    <x-slide.stack>
        @foreach($data['actividades'] as $actividad)
            @include('modules.actividad', compact('actividad'))
        @endforeach
    </x-slide.stack>
@endisset

</x-layouts.reveal> --}}
{{-- <x-layouts.reveal>
    @include('modules.presentacion', ['presentacion' => $data['presentacion']])
    @include('modules.proyecto', ['proyecto' => $data['proyecto']])

    <x-slide.stack>
        @include('modules.actividades', ['actividades' => $data['actividades']])
    </x-slide.stack>
    
    @include('modules.reportes', ['reportes' => $data['reportes']])

    @isset($data['tickets'])

        @include('modules.tickets')

        @include('modules.tickets-globales', [
            'tickets' => $data['tickets']['globales']
        ])

        <x-slide.stack>
            @foreach($data['tickets']['por_agente'] as $agente)
                @include('modules.tickets-agente', compact('agente'))
            @endforeach
        </x-slide.stack>

    @endisset
    
    @include('modules.anuncios', ['anuncios' => $data['anuncios']])
    
</x-layouts.reveal> --}}
<x-layouts.reveal>

    @include('modules.presentacion', [
        'presentacion' => $data['presentacion']
    ])
    
    @isset($data['proyectos'])
        @foreach($data['proyectos'] as $proyecto)
    
            {{-- Slide principal del proyecto --}}
            @include('modules.proyecto', compact('proyecto'))
    
            {{-- Actividades del proyecto (verticales) --}}
            @isset($proyecto['actividades'])
                <x-slide.stack>
                    @include('modules.actividades', [
                        'actividades' => $proyecto['actividades']
                    ])
                </x-slide.stack>
            @endisset
    
        @endforeach
    @endisset
    
    {{-- Resto de slides globales --}}
    @isset($data['reportes'])
        @include('modules.reportes', ['reportes' => $data['reportes']])
    @endisset
    
    @isset($data['tickets'])
        @include('modules.tickets')
        @include('modules.tickets-globales', [
            'tickets' => $data['tickets']['globales']
        ])
    
        <x-slide.stack>
            @foreach($data['tickets']['por_agente'] as $agente)
                @include('modules.tickets-agente', compact('agente'))
            @endforeach
        </x-slide.stack>
    @endisset
    
    @isset($data['anuncios'])
        @include('modules.anuncios', ['anuncios' => $data['anuncios']])
    @endisset
    
    </x-layouts.reveal>