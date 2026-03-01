<!doctype html>
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
</html>