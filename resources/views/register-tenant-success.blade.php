@extends('bossonboarding::layouts.auth')

@section('title', 'Registrazione Completata - BossPlatform')

@section('back-text', 'Torna alla home')

@section('auth-content')
    <!-- Success Header -->
    <div class="mb-8 text-center">
        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 dark:bg-green-900 mb-4">
            <svg class="h-8 w-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
            Registrazione Completata!
        </h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Il tuo tenant è stato creato con successo
        </p>
    </div>

    <!-- Tenant Details -->
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
            Dettagli del Tenant
        </h2>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Nome Tenant</label>
                <p class="mt-1 text-sm text-gray-900 dark:text-white font-medium">{{ $tenant->name }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Dominio</label>
                <p class="mt-1 text-sm text-gray-900 dark:text-white font-medium">{{ $tenant->domain }}.{{ config('bossonboarding.default_domain_suffix') }}</p>
            </div>
        </div>
    </div>

    <!-- Next Steps -->
    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6 mb-6">
        <h3 class="text-lg font-semibold text-blue-900 dark:text-blue-100 mb-3">
            Prossimi Passi
        </h3>
        <ul class="space-y-2 text-sm text-blue-800 dark:text-blue-200">
            <li class="flex items-start">
                <svg class="h-5 w-5 text-blue-600 dark:text-blue-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Accedi al tuo tenant con le credenziali create
            </li>
            <li class="flex items-start">
                <svg class="h-5 w-5 text-blue-600 dark:text-blue-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Configura le tue prime automazioni
            </li>
            <li class="flex items-start">
                <svg class="h-5 w-5 text-blue-600 dark:text-blue-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Invita i tuoi team members
            </li>
        </ul>
    </div>

    <!-- Action Buttons -->
    <div class="space-y-3">
        <a href="https://{{ $tenant->domain }}.{{ config('bossonboarding.default_domain_suffix') }}{{ config('bossonboarding.admin_panel_path') }}"
           class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
            Accedi al tuo Tenant
        </a>

        <a href="{{ url('/') }}"
           class="w-full flex justify-center py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
            Torna alla Home
        </a>
    </div>
@endsection

@section('auth-links')
    <div class="text-center space-y-4">
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Hai bisogno di aiuto?
            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                Contatta il supporto
            </a>
        </p>

        <div class="text-xs text-gray-500 dark:text-gray-400 space-y-1">
            <p>
                <a href="#" class="hover:text-gray-700 dark:hover:text-gray-300">
                    Documentazione
                </a>
            </p>
            <p>
                <a href="#" class="hover:text-gray-700 dark:hover:text-gray-300">
                    Video tutorial
                </a>
            </p>
            <p>
                <a href="#" class="hover:text-gray-700 dark:hover:text-gray-300">
                    Community forum
                </a>
            </p>
        </div>
    </div>
@endsection
