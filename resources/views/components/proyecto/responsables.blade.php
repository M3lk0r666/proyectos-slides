{{-- @props(['personas'])

@if (count($personas))
<div>
    <h4 class="font-bold text-lg mb-2">Responsables Cliente</h4>
    <ul class="space-y-1">
        @foreach ($personas as $p)
            <li>
                <strong>{{ $p['nombre'] }}</strong>
                <span class="opacity-70"> — {{ $p['puesto'] }}</span>
            </li>
        @endforeach
    </ul>
</div>
@endif --}}

<div>
    <h3 class="text-xl font-semibold mb-6">
        Personal Cliente
    </h3>
    <div class="space-y-4">
        @foreach ($proyecto['responsables_cliente'] as $c)
            <div>
                <div class="font-semibold">
                    {{ $c['nombre'] }}
                </div>
                <div class="text-sm text-gray-500">
                    {{ $c['puesto'] }}
                </div>
            </div>
        @endforeach
    </div>
</div>
