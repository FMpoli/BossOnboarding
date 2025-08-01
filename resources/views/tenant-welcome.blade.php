<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - {{ app('currentTenant')->name }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col min-h-screen">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between py-4">
                        <div class="flex items-center">
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                                {{ app('currentTenant')->name }}
                            </h1>
                        </div>
                        <nav class="flex items-center space-x-4">
                            @auth
                                <a href="{{ route('filament.app.pages.dashboard') }}"
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('filament.app.auth.login') }}"
                                   class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                    Log in
                                </a>
                            @endauth
                        </nav>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1">
                <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white sm:text-5xl">
                            Benvenuto in {{ app('currentTenant')->name }}
                        </h2>
                        <p class="mt-4 text-xl text-gray-600 dark:text-gray-400">
                            La tua applicazione è pronta per essere utilizzata.
                        </p>

                        <div class="mt-8">
                            @auth
                                <a href="{{ route('filament.app.pages.dashboard') }}"
                                   class="inline-flex items-center px-6 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Vai alla Dashboard
                                </a>
                            @else
                                <a href="{{ route('filament.app.auth.login') }}"
                                   class="inline-flex items-center px-6 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Accedi
                                </a>
                            @endauth
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="mt-16">
                        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="overflow-hidden bg-white rounded-lg shadow dark:bg-gray-800">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Pronto all'uso</h3>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">La tua applicazione è configurata e pronta.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden bg-white rounded-lg shadow dark:bg-gray-800">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Veloce</h3>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Performance ottimizzate per la tua applicazione.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden bg-white rounded-lg shadow dark:bg-gray-800">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Sicuro</h3>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Protezione avanzata per i tuoi dati.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="text-sm text-center text-gray-500 dark:text-gray-400">
                        <p>&copy; {{ date('Y') }} {{ app('currentTenant')->name }}. Tutti i diritti riservati.</p>
                    </div>
                </div>
            </footer>
        </div>

        @livewireScripts
    </body>
</html>
