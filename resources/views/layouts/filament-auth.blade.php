<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $this->getTitle() }} - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('vendor/bossonboarding/css/app.css') }}">
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50 dark:bg-gray-900">
        <div class="min-h-screen flex">
            <!-- Left Column - Background -->
            <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
                <div class="flex items-center justify-center w-full">
                    <div class="max-w-md text-center">
                        <div class="mb-8">
                            <svg class="w-24 h-24 mx-auto text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                            BossPlatform
                        </h1>
                        <p class="text-lg text-gray-600 dark:text-gray-300">
                            La tua piattaforma di automazione intelligente
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Column - Form -->
            <div class="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-8">
                <div class="max-w-md w-full space-y-8">
                    <!-- Header -->
                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                            {{ $this->getHeading() }}
                        </h2>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ $this->getSubheading() }}
                        </p>
                    </div>

                    <!-- Form -->
                    <div class="bg-white dark:bg-gray-800 py-8 px-6 shadow-xl rounded-xl">
                        {{ $slot }}
                    </div>

                    <!-- Footer Links -->
                    <div class="text-center space-y-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Non hai un account?
                            <a href="{{ route('register.tenant') }}" class="font-semibold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                                Crea un account
                            </a>
                        </p>

                        <div class="space-y-1 text-xs text-gray-500 dark:text-gray-400">
                            <p>
                                <a href="#" class="hover:text-gray-700 dark:hover:text-gray-300">
                                    Hai bisogno di aiuto?
                                </a>
                            </p>
                            <p>
                                <a href="#" class="hover:text-gray-700 dark:hover:text-gray-300">
                                    Contatta il supporto
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @livewireScripts
    </body>
</html> 