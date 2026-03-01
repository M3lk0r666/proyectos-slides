@props([
    'color' => 'gray'
])

<span class="
    inline-block px-3 py-1 rounded-full text-sm font-semibold
    bg-{{ $color }}-100
    text-{{ $color }}-800
">
    {{ $slot }}
</span>