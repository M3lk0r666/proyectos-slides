<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Admin | @yield('title')</title>

    @vite('resources/css/app.css')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        @include('admin.layouts.sidebar')

        {{-- CONTENIDO --}}
        <main class="flex-1 p-8">

            {{-- Mensajes --}}
            @if (session('success'))
                <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')

        </main>

    </div>

    @stack('modals')

    @livewireScripts


    <script>
        function activityEditor(id, tema) {
            return {
                tema: tema,
                saved: false,
                save() {
                    fetch(`{{ url('/admin/activities') }}/${id}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            tema: this.tema
                        })
                    }).then(() => {
                        this.saved = true
                        setTimeout(() => this.saved = false, 1500)
                    })
                }
            }
        }
    </script>
</body>

</html>
