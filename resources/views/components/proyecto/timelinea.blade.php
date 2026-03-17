<div class="relative flex justify-center py-6">
    {{-- línea central --}}
    {{-- <div class="w-2 bg-green-500 rounded-full absolute h-full"></div> --}}

    <div class="space-y-6">
        @foreach ($proyecto['personal_netjer'] as $index => $staff)
            @php
                $colors = [
                    'Account Manager' => 'accent-green',
                    'Ingeniero Responsable' => 'accent-teal',
                    'Ingeniero Staff' => 'accent-blue',
                    'Service Management' => 'accent-dark-blue',
                    'Project Manager' => 'accent-purple',
                ];
                $color = $colors[$staff['rol']] ?? 'accent-green';
            @endphp

            <div class="flex items-center {{ $index % 2 == 0 ? '' : 'flex-row-reverse' }}">
                {{-- tarjeta --}}
                <div class="{{ $index % 2 == 0 ? 'text-right pr-4' : 'text-left pl-4' }}">
                    <p class="text-[10px] tracking-widest text-slate-400 font-bold uppercase mb-1">
                        {{ $staff['rol'] }}
                    </p>
                    <div class="bg-{{ $color }} p-2 w-40 text-white shadow-lg rounded-lg">
                        <p class="font-bold leading-none text-sm uppercase">
                            {{ $staff['nombre'] }}
                        </p>
                    </div>
                </div>
                {{-- nodo --}}
                <div
                    class="w-8 h-8 rounded-full bg-white border-2 border-{{ $color }} flex items-center justify-center shadow-md">
                    {{-- <span class="material-icons text-{{ $color }} text-sm">
                        person
                    </span> --}}
                    <i class="las la-user-alt text-{{ $color }} text-3xl"></i>
                </div>
            </div>
        @endforeach
    </div>
</div>
