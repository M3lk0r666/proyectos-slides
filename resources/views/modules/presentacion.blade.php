{{-- <x-slide.section>
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
 --}}
<x-slide.netjer>
    <div class="flex items-center justify-center h-full gap-20">
        {{--  <div>
            <img src="{{ asset('assets/media/logo-naranja.png') }}" class="h-28">
        </div> --}}
        <div class="text-left">
            <h1>
                {{ $presentacion['titulo'] }}
            </h1>
            <p class="text-3xl mt-6">
                {{ $presentacion['subtitulo'] }}
            </p>
            <p class="mt-6 text-xl text-gray-300">
                {{ $presentacion['periodo'] }}
            </p>
        </div>
    </div>
</x-slide.netjer>
