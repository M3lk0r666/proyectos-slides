<section {{ $attributes->merge(['class' => 'p-12']) }}>
    @isset($title)
        <h2 class="text-4xl font-bold mb-6">{{ $title }}</h2>
    @endisset

    {{ $slot }}
</section>