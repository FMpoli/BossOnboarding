<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BossPlatform')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('vendor/bossonboarding/css/app.css') }}">
    
    @livewireStyles
</head>
<body class="h-full bg-gray-50 dark:bg-gray-900">
    <div class="flex min-h-screen">
        <!-- Left Column - Auth Form -->
        <div class="flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:px-8">
            <div class="w-full max-w-md mx-auto">
                <!-- Back Arrow -->
                <div class="mb-8">
                    <a href="{{ url('/') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        @yield('back-text', 'Torna alla home')
                    </a>
                </div>

                <!-- Auth Content -->
                <div class="space-y-6">
                    @yield('auth-content')
                </div>

                <!-- Additional Links -->
                @hasSection('auth-links')
                    <div class="mt-8">
                        @yield('auth-links')
                    </div>
                @endif
            </div>
        </div>

        <!-- Right Column - Marketing/Branding -->
        <div class="hidden lg:block lg:w-1/2 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600">
            <div class="flex flex-col justify-center h-full px-12 py-16">
                <!-- Logo -->
                <div class="mb-12">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-white">BossPlatform</span>
                    </div>
                </div>

                <!-- Hero Content -->
                <div class="max-w-md">
                    <h1 class="text-4xl font-bold text-white mb-4">
                        Porta le tue idee alla vita
                        <span class="text-pink-300">#conBossPlatform</span>
                    </h1>
                    <p class="text-xl text-indigo-100 mb-6">
                        Da task e workflow ad app e sistemi, costruisci e automatizza tutto in una potente piattaforma visiva.
                    </p>
                    <p class="text-lg text-indigo-200">
                        Fidato da 500+ Aziende | Gratis per sempre
                    </p>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="{{ asset('vendor/bossonboarding/js/app.js') }}" defer></script>
</body>
</html> 