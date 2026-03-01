@props(['items'])

@if(count($items))
<div>
    <h4 class="font-bold text-lg mb-2">Puntos clave</h4>
    <ul class="list-disc ml-5 space-y-1">
        @foreach($items as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>
@endif