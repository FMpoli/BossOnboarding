<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('vendor/bossonboarding/css/app.css') }}">
    <script src="{{ asset('vendor/bossonboarding/js/app.js') }}" defer></script>

    @livewireStyles
    @stack('styles')

</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col min-h-screen">
        <!-- Header -->
        @hasSection('header')
            @yield('header')
        @else
            <header class="bg-white border-b border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between py-4">
                        <div class="flex items-center">
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                                @yield('app-name', config('app.name', 'Laravel'))
                            </h1>
                        </div>
                        @hasSection('header-nav')
                            <nav class="flex items-center space-x-4">
                                @yield('header-nav')
                            </nav>
                        @endif
                    </div>
                </div>
            </header>
        @endif

        <!-- Main Content -->
        <main class="flex-1">
            @hasSection('content')
                @yield('content')
            @else
                <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    @yield('main')
                </div>
            @endif
        </main>

        <!-- Footer -->
        @hasSection('footer')
            @yield('footer')
        @else
            <footer class="bg-white border-t border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="text-sm text-center text-gray-500 dark:text-gray-400">
                        <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Tutti i diritti riservati.</p>
                    </div>
                </div>
            </footer>
        @endif
    </div>

    @livewireScripts

    <!-- Filament Schemas JS -->
    <script src="{{ asset('js/filament/schemas/schemas.js') }}"></script>

    @stack('scripts')
</body>
</html>
