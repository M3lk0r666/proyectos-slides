<x-slide.section>
    <div class="text-center space-y-6">
        <img src="{{ $presentacion['logo'] }}" class="mx-auto h-24">

        <h1 class="text-5xl font-bold">
            {{ $presentacion['titulo'] }}
        </h1>

        <p class="text-xl opacity-80">
            {{ $presentacion['subtitulo'] }}
        </p>

        <span class="text-lg">
            {{ $presentacion['periodo'] }}
        </span>
    </div>
</x-slide.section>