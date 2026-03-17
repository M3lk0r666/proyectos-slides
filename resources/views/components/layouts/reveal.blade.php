{{-- <!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'Presentación' }}</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://unpkg.com/reveal.js/dist/reveal.css">
    <link rel="stylesheet" href="https://unpkg.com/reveal.js/dist/theme/black.css">
</head>
<body>

<div class="reveal">
    <div class="slides">
        {{ $slot }}
    </div>
</div>

<script src="https://unpkg.com/reveal.js/dist/reveal.js"></script>
<script>
    Reveal.initialize({
        hash: true,
        slideNumber: true,
        transition: 'fade'
    });
</script>

</body>
</html> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Presentacion') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Line Awesome -->
    <link rel= "stylesheet" href= "/assets/lineawesome/css/line-awesome.min.css">
    <!-- Remix Icon -->
    <link rel= "stylesheet" href= "/assets/remix-icon/remixicon.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <link rel="stylesheet" href="{{ asset('assets/css/netjer-slides.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reveal.js/dist/reveal.css">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
</head>

<body>
    <div class="reveal">
        <div class="slides">
            {{ $slot }}
        </div>
    </div>

    @stack('modals')

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/reveal.js/dist/reveal.js"></script>
    <script>
        Reveal.initialize({
            hash: true,
            slideNumber: true,
            transition: 'fade',
        });
    </script>
</body>

</html>
