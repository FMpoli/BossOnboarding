@extends('bossonboarding::layouts.app')

@section('auth-layout')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 flex items-center justify-center p-4">
    <div class="w-full">
        <!-- Modern Welcome Icon -->
        <div class="flex justify-center mb-8">
            <div class="relative">
                <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <!-- Subtle glow effect -->
                <div class="absolute inset-0 w-20 h-20 bg-gradient-to-br from-indigo-400/30 to-purple-500/30 rounded-full blur-lg"></div>
            </div>
        </div>

        <!-- Enhanced Content Card -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl p-8 border border-white/20 dark:bg-gray-800/90 dark:border-gray-700/50">
            <h1 class="text-3xl font-bold text-gray-900 text-center mb-6 dark:text-white bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                Benvenuto su BossPlatform!
            </h1>

            <div class="space-y-4 mb-8">
                <p class="text-gray-600 text-center dark:text-gray-300 leading-relaxed">
                    Il dominio <span class="font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded text-sm font-semibold">{{ request()->get('domain', request()->getHost()) }}.bossnew.ddev.site</span> non è ancora configurato.
                </p>

                <p class="text-gray-600 text-center dark:text-gray-300 leading-relaxed">
                    È il momento perfetto per creare il tuo ambiente personalizzato e iniziare ad automatizzare i tuoi processi!
                </p>
            </div>

            <!-- Enhanced Action Buttons -->
            <div class="space-y-4">
                <a href="{{ route('register.tenant') }}"
                   class="group w-full inline-flex justify-center items-center px-6 py-4 text-white bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-3 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Crea il tuo ambiente
                </a>

                <a href="https://bossnew.ddev.site"
                   class="group w-full inline-flex justify-center items-center px-6 py-4 text-gray-700 bg-gray-50 hover:bg-gray-100 rounded-xl transition-all duration-300 font-medium border border-gray-200 hover:border-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:border-gray-600 dark:hover:border-gray-500">
                    <svg class="w-5 h-5 mr-3 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Torna alla home
                </a>
            </div>
        </div>

        <!-- Enhanced Footer -->
        <div class="text-center mt-8">
            <div class="inline-flex items-center space-x-2 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-full px-6 py-3 border border-white/20 dark:border-gray-700/50">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm text-gray-600 dark:text-gray-400">Hai bisogno di aiuto?</span>
                <a href="mailto:support@bossplatform.com" class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 font-medium hover:underline transition-colors">
                    Contattaci
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
