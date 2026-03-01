<x-slide.section title="Anuncios Parroquiales">
    <div class="grid grid-cols-2 gap-6">
    @foreach($anuncios as $a)
        <div class="text-center">
            <img src="{{ $a['imagen'] }}" class="mx-auto mb-2">
            <p>{{ $a['texto'] }}</p>
        </div>
    @endforeach
    </div>
    </x-slide.section>