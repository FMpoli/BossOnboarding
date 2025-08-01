<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Registrazione Completata - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles -->
        <!-- Use compiled assets instead of Vite -->
        <link rel="stylesheet" href="{{ asset('vendor/bossonboarding/css/app.css') }}">
        <script src="{{ asset('vendor/bossonboarding/js/app.js') }}" defer></script>

        @livewireStyles
    </head>
    <body class="bg-gray-50 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col">
            <!-- Header -->
            <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center py-4">
                        <div class="flex items-center">
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                                {{ config('app.name', 'Laravel') }}
                            </h1>
                        </div>
                        <nav class="flex items-center space-x-4">
                            <a href="{{ route('register.tenant') }}"
                               class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                Registra altro tenant
                            </a>
                        </nav>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1">
                <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <!-- Success Icon -->
                        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 dark:bg-green-900 mb-6">
                            <svg class="h-8 w-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>

                        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl mb-4">
                            Registrazione Completata!
                        </h2>

                        <p class="text-xl text-gray-600 dark:text-gray-400 mb-8">
                            Il tuo tenant è stato creato con successo e è pronto per essere utilizzato.
                        </p>

                        @if($tenant)
                            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-8">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                                    Dettagli del Tenant
                                </h3>
                                <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nome Tenant</dt>
                                        <dd class="text-lg text-gray-900 dark:text-white">{{ $tenant->name }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Dominio</dt>
                                        <dd class="text-lg text-gray-900 dark:text-white">{{ $tenant->domain }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Database</dt>
                                        <dd class="text-lg text-gray-900 dark:text-white">{{ $tenant->database }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">URL</dt>
                                        <dd class="text-lg text-gray-900 dark:text-white">
                                            <a href="https://{{ $tenant->domain }}.{{ config('app.domain', 'boss.ddev.site') }}"
                                               class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 underline"
                                               target="_blank">
                                                https://{{ $tenant->domain }}.{{ config('app.domain', 'boss.ddev.site') }}
                                            </a>
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        @endif

                        <div class="space-y-4">
                            <a href="https://{{ $tenant->domain ?? 'your-tenant' }}.{{ config('app.domain', 'boss.ddev.site') }}"
                               target="_blank"
                               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                Visita il tuo tenant
                            </a>

                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                <p>Puoi accedere al tuo tenant usando le credenziali che hai fornito durante la registrazione.</p>
                            </div>
                        </div>

                        <!-- Next Steps -->
                        <div class="mt-12 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                            <h3 class="text-lg font-medium text-blue-900 dark:text-blue-100 mb-4">
                                Prossimi Passi
                            </h3>
                            <ul class="text-left space-y-2 text-blue-800 dark:text-blue-200">
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 w-2 h-2 bg-blue-600 rounded-full mt-2 mr-3"></span>
                                    <span>Accedi al tuo tenant con le credenziali admin</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 w-2 h-2 bg-blue-600 rounded-full mt-2 mr-3"></span>
                                    <span>Configura le impostazioni iniziali</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 w-2 h-2 bg-blue-600 rounded-full mt-2 mr-3"></span>
                                    <span>Inizia a utilizzare la tua applicazione</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400">
                        <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Tutti i diritti riservati.</p>
                    </div>
                </div>
            </footer>
        </div>

        @livewireScripts
    </body>
</html>
