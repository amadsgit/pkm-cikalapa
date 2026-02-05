<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') | SIMPKM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/images/favicon.png" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logopkm.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logopkm.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logopkm.png') }}">

    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Terapkan font Inter ke seluruh dokumen */
        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
    </style>

    <!-- Tailwind & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    @stack('styles')
</head>

<body class="bg-gradient-to-br min-h-screen text-gray-800 antialiased">

    <!-- Notifikasi -->
    @if (session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
        class="fixed top-5 left-1/2 -translate-x-1/2 bg-green-500 text-white font-semibold px-6 py-3 rounded-xl shadow-lg z-50">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
        class="fixed top-5 left-1/2 -translate-x-1/2 bg-red-500 text-white font-semibold px-6 py-3 rounded-xl shadow-lg z-50">
        {{ session('error') }}
    </div>
    @endif

    <!-- Wrapper -->
    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Main -->
        <div class="flex-1 flex flex-col overflow-hidden bg-white shadow-inner">

            <!-- Topbar -->
            @include('components.topbar')

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-6 bg-gradient-to-br from-white via-emerald-50 to-sky-50">
                @yield('content')
            </main>

            <!-- Footer -->
            @include('components.footer')
        </div>
    </div>

    @stack('scripts')

    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>