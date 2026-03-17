@props([
    'color' => 'gray',
])

<span
    class="
    inline-block px-3 py-1 rounded-full text-sm font-semibold
    bg-{{ $color }}-100
    text-{{ $color }}-800
">

    {{-- <span
    class="rotate-90 bg-{{ $color }}-100 text-{{ $color }}-800 font-bold tracking-[0.5em] whitespace-nowrap text-2xl "> --}}
    {{ $slot }}
</span>
