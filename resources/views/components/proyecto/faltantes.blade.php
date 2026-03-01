@props(['items'])

<div>
    <h4 class="font-bold text-lg mb-2">Faltantes</h4>

    @if(count($items))
        <ul class="list-disc ml-5 space-y-1">
            @foreach($items as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    @else
        <p class="opacity-60">Sin faltantes</p>
    @endif
</div>