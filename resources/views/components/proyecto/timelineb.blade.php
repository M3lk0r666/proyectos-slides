<div class="relative flex justify-center py-6">
    {{-- línea central --}}
    {{-- <div class="w-2 bg-green-500 rounded-full absolute h-full"></div> --}}

    <div class="space-y-6">
        @foreach ($proyecto['responsables_cliente'] as $index => $client)
            @php
                $colors = [
                    'Ingeniero Red' => 'accent-teal',
                    'Sr. redes' => 'accent-blue',
                ];
                $color = $colors[$client['puesto']] ?? 'accent-green';
            @endphp

            <div class="flex items-center {{ $index % 2 == 0 ? '' : 'flex-row-reverse' }}">
                {{-- tarjeta --}}
                <div class="{{ $index % 2 == 0 ? 'text-right pr-4' : 'text-left pl-4' }}">
                    <p class="text-[10px] tracking-widest text-slate-400 font-bold uppercase mb-1">
                        {{ $client['nombre'] }}
                    </p>
                    <div class="bg-{{ $color }} p-2 w-40 text-white shadow-lg rounded-lg">
                        <p class="font-bold leading-none text-sm uppercase">
                            {{ $client['puesto'] }}
                        </p>
                    </div>
                </div>
                {{-- nodo --}}
                <div
                    class="w-8 h-8 rounded-full bg-white border-2 border-{{ $color }} flex items-center justify-center shadow-md">
                    <i class="las la-user-alt text-{{ $color }} text-3xl"></i>
                </div>
            </div>
        @endforeach
    </div>
</div>
