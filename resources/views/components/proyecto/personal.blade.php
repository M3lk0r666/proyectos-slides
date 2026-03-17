{{-- @props(['personas'])

@if (count($personas))
<div>
    <h4 class="font-bold text-lg mb-2">Personal Netjer</h4>
    <ul class="space-y-1">
        @foreach ($personas as $p)
            <li>
                <strong>{{ $p['nombre'] }}</strong>
                <span class="opacity-70"> — {{ $p['rol'] }}</span>
            </li>
        @endforeach
    </ul>
</div>
@endif --}}
{{-- <div>
    <h3 class="text-xl font-semibold mb-6">
        Personal Netjer
    </h3>
    <div class="relative pl-6">
        
        <div class="absolute left-2 top-0 bottom-0 w-1 bg-green-400"></div>
        <div class="space-y-6">
            @foreach ($proyecto['personal_netjer'] as $staff)
                <div class="fragment fade-up">
                    
                    <div class="absolute -left-2 top-2 w-4 h-4 bg-green-500 rounded-full"></div>
                    <div class="bg-green-100 p-3 rounded shadow-sm">
                        <strong>
                            {{ $staff['nombre'] }}
                        </strong>
                        <div class="text-sm text-gray-600">
                            {{ $staff['rol'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div> --}}
{{-- <div class="timeline-line"></div>
<div class="timeline-dot"></div>
<div>

    <h3 class="text-xl font-semibold mb-6">
        Personal Netjer
    </h3>

    <div class="relative pl-6">

        <div class="absolute left-2 top-0 bottom-0 w-1 bg-green-400"></div>

        <div class="space-y-6">

            @foreach ($proyecto['personal_netjer'] as $staff)
                <div class="relative fragment fade-up">

                    <div class="absolute -left-2 top-2 w-4 h-4 bg-green-500 rounded-full"></div>

                    <div class="bg-green-100 p-3 rounded shadow-sm">

                        <strong>
                            {{ $staff['nombre'] }}
                        </strong>

                        <div class="text-sm text-gray-600">
                            {{ $staff['rol'] }}
                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>

</div> --}}

<div>
    <h3 class="text-xl font-semibold mb-6">
        Personal Netjer
    </h3>
    <div class="relative pl-8">
        {{-- línea --}}
        <div class="absolute left-3 top-0 bottom-0 w-1 bg-green-500"></div>
        <div class="space-y-6">
            @foreach ($proyecto['personal_netjer'] as $staff)
                <div class="relative fragment fade-up">
                    <div class="absolute -left-2 top-2 w-4 h-4 bg-green-500 rounded-full"></div>
                    <div>
                        <div class="font-semibold text-lg">
                            {{ $staff['nombre'] }}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ $staff['rol'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
