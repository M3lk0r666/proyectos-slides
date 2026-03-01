@props(['personas'])

@if(count($personas))
<div>
    <h4 class="font-bold text-lg mb-2">Personal Netjer</h4>
    <ul class="space-y-1">
        @foreach($personas as $p)
            <li>
                <strong>{{ $p['nombre'] }}</strong>
                <span class="opacity-70"> — {{ $p['rol'] }}</span>
            </li>
        @endforeach
    </ul>
</div>
@endif