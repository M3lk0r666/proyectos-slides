<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'Presentación' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reveal.js/dist/reveal.css">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/netjer-slides.css') }}"> --}}
</head>

<body>
    <div class="reveal">
        <p>HOLA boroals</p>
        <div class="slides">
            {{ $slot }}
        </div>
    </div>

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
