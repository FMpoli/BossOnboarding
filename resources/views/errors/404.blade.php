@extends('bossonboarding::layouts.error')

@section('title', 'Pagina non trovata')

@section('content')
<div class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Error Icon -->
        <div class="flex justify-center mb-8">
            <div class="relative">
                <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-pink-600 rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <div class="absolute inset-0 w-20 h-20 bg-gradient-to-br from-red-400/30 to-pink-500/30 rounded-full blur-lg"></div>
            </div>
        </div>

        <!-- Content Card -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl p-8 border border-white/20 dark:bg-gray-800/90 dark:border-gray-700/50">
            <h1 class="text-3xl font-bold text-gray-900 text-center mb-6 dark:text-white bg-gradient-to-r from-red-600 to-pink-600 bg-clip-text text-transparent">
                Pagina non trovata
            </h1>

            <div class="space-y-4 mb-8">
                <p class="text-gray-600 text-center dark:text-gray-300 leading-relaxed">
                    La pagina che stai cercando non esiste o è stata spostata.
                </p>
                <p class="text-gray-600 text-center dark:text-gray-300 leading-relaxed">
                    Errore 404
                </p>
            </div>

                        <!-- Action Buttons -->
            <div class="space-y-4">
                @php
                    $previousUrl = url()->previous();
                    $currentUrl = url()->current();
                    $hasPrevious = $previousUrl !== $currentUrl && $previousUrl !== url('/');
                @endphp

                @if($hasPrevious)
                    <a href="{{ $previousUrl }}"
                       class="group w-full inline-flex justify-center items-center px-6 py-4 text-white bg-gradient-to-r from-red-600 to-pink-600 rounded-xl hover:from-red-700 hover:to-pink-700 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-3 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Torna alla pagina precedente
                    </a>
                @endif

                @php
                    $host = request()->getHost();
                    $centralDomains = config('bossonboarding.central_domains', ['boss.ddev.site', 'bossnew.ddev.site']);
                    $isCentralDomain = in_array($host, $centralDomains);
                    $isLoggedIn = auth()->check();
                @endphp

                @if($isCentralDomain)
                    <a href="/admin"
                       class="group w-full inline-flex justify-center items-center px-6 py-4 text-gray-700 bg-gray-50 hover:bg-gray-100 rounded-xl transition-all duration-300 font-medium border border-gray-200 hover:border-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:border-gray-600 dark:hover:border-gray-500">
                        <svg class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Vai alla Dashboard Admin
                    </a>
                @else
                    @if($isLoggedIn)
                        <a href="/app"
                           class="group w-full inline-flex justify-center items-center px-6 py-4 text-gray-700 bg-gray-50 hover:bg-gray-100 rounded-xl transition-all duration-300 font-medium border border-gray-200 hover:border-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:border-gray-600 dark:hover:border-gray-500">
                            <svg class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Vai alla mia Dashboard
                        </a>
                    @else
                        <a href="/"
                           class="group w-full inline-flex justify-center items-center px-6 py-4 text-gray-700 bg-gray-50 hover:bg-gray-100 rounded-xl transition-all duration-300 font-medium border border-gray-200 hover:border-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:border-gray-600 dark:hover:border-gray-500">
                            <svg class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Torna alla Home
                        </a>
                    @endif
                @endif
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8">
            <div class="inline-flex items-center space-x-2 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-full px-6 py-3 border border-white/20 dark:border-gray-700/50">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm text-gray-600 dark:text-gray-400">Hai bisogno di aiuto?</span>
                <a href="mailto:support@bossplatform.com" class="text-red-600 hover:text-red-500 dark:text-red-400 font-medium hover:underline transition-colors">
                    Contattaci
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
