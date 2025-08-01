<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
    @stack('styles')

</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">
    @hasSection('auth-layout')
        <!-- Auth Layout - Two Column Design like MAKE.com -->
        <div class="flex min-h-screen">
            <!-- Left Column - Auth Form -->
            <div class="flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:px-8">
                <div class="w-full max-w-md mx-auto">
                    @yield('auth-layout')
                </div>
            </div>

            <!-- Right Column - Marketing/Branding -->
            <div class="hidden lg:block lg:w-1/2 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600">
                <div class="flex flex-col justify-center h-full px-12 py-16">
                    <!-- Logo -->
                    <div class="mb-12">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-10 h-10 mr-3 bg-white rounded-lg">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <span class="text-2xl font-bold text-white">BossPlatform</span>
                        </div>
                    </div>

                    <!-- Hero Content -->
                    <div class="max-w-md">
                        <h1 class="mb-4 text-4xl font-bold text-white">
                            Porta le tue idee alla vita
                            <span class="text-pink-300">#conBossPlatform</span>
                        </h1>
                        <p class="mb-6 text-xl text-indigo-100">
                            Da task e workflow ad app e sistemi, costruisci e automatizza tutto in una potente piattaforma visiva.
                        </p>
                        <p class="text-lg text-indigo-200">
                            Fidato da 500+ Aziende | Gratis per sempre
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Standard Layout with Header/Footer -->
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
    @endif

    @livewireScripts

    <!-- Filament Schemas JS -->
    <script src="{{ asset('js/filament/schemas/schemas.js') }}"></script>

    @stack('scripts')
</body>
</html>
