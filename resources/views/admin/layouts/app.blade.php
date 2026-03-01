<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin · @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-gray-800 text-white px-6 py-4 flex justify-between">
        <span class="font-semibold">Panel Admin</span>
        <a href="{{ route('admin.presentations.index') }}" class="hover:underline">
            Presentaciones
        </a>
    </nav>

    <main class="max-w-7xl mx-auto p-6">
        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>