<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BossPlatform - Automazione Intelligente per la Tua Azienda</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                /* Inline CSS per fallback quando Vite non è disponibile */
                body { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; }
                .bg-gradient-to-br { background: linear-gradient(to bottom right, var(--tw-gradient-stops)); }
                .from-indigo-50 { --tw-gradient-from: #eef2ff; --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(238, 242, 255, 0)); }
                .to-blue-50 { --tw-gradient-to: #eff6ff; }
                .dark\:from-gray-900 { --tw-gradient-from: #111827; }
                .dark\:to-gray-800 { --tw-gradient-to: #1f2937; }
                .text-indigo-600 { color: #4f46e5; }
                .dark\:text-indigo-400 { color: #818cf8; }
                .bg-indigo-600 { background-color: #4f46e5; }
                .hover\:bg-indigo-700:hover { background-color: #4338ca; }
                .text-white { color: #ffffff; }
                .px-8 { padding-left: 2rem; padding-right: 2rem; }
                .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
                .rounded-lg { border-radius: 0.5rem; }
                .transition-colors { transition-property: color, background-color, border-color, text-decoration-color, fill, stroke; }
                .text-lg { font-size: 1.125rem; line-height: 1.75rem; }
                .font-semibold { font-weight: 600; }
                .mb-6 { margin-bottom: 1.5rem; }
                .text-5xl { font-size: 3rem; line-height: 1; }
                .md\:text-6xl { font-size: 3.75rem; line-height: 1; }
                .font-bold { font-weight: 700; }
                .text-gray-900 { color: #111827; }
                .dark\:text-white { color: #ffffff; }
                .max-w-3xl { max-width: 48rem; }
                .mx-auto { margin-left: auto; margin-right: auto; }
                .mb-8 { margin-bottom: 2rem; }
                .text-xl { font-size: 1.25rem; line-height: 1.75rem; }
                .text-gray-600 { color: #4b5563; }
                .dark\:text-gray-300 { color: #d1d5db; }
                .flex { display: flex; }
                .flex-col { flex-direction: column; }
                .justify-center { justify-content: center; }
                .gap-4 { gap: 1rem; }
                .sm\:flex-row { flex-direction: row; }
                .border { border-width: 1px; }
                .border-gray-300 { border-color: #d1d5db; }
                .dark\:border-gray-600 { border-color: #4b5563; }
                .text-gray-700 { color: #374151; }
                .dark\:text-gray-300 { color: #d1d5db; }
                .hover\:bg-gray-50:hover { background-color: #f9fafb; }
                .dark\:hover\:bg-gray-800:hover { background-color: #1f2937; }
                .py-20 { padding-top: 5rem; padding-bottom: 5rem; }
                .px-4 { padding-left: 1rem; padding-right: 1rem; }
                .max-w-7xl { max-width: 80rem; }
                .sm\:px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
                .lg\:px-8 { padding-left: 2rem; padding-right: 2rem; }
                .text-center { text-align: center; }
                .mb-4 { margin-bottom: 1rem; }
                .text-4xl { font-size: 2.25rem; line-height: 2.5rem; }
                .mb-8 { margin-bottom: 2rem; }
                .grid { display: grid; }
                .gap-8 { gap: 2rem; }
                .md\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
                .p-6 { padding: 1.5rem; }
                .text-center { text-align: center; }
                .w-16 { width: 4rem; }
                .h-16 { height: 4rem; }
                .mx-auto { margin-left: auto; margin-right: auto; }
                .mb-4 { margin-bottom: 1rem; }
                .bg-indigo-100 { background-color: #e0e7ff; }
                .dark\:bg-indigo-900 { background-color: #312e81; }
                .rounded-full { border-radius: 9999px; }
                .w-8 { width: 2rem; }
                .h-8 { height: 2rem; }
                .text-indigo-600 { color: #4f46e5; }
                .dark\:text-indigo-400 { color: #818cf8; }
                .mb-2 { margin-bottom: 0.5rem; }
                .text-xl { font-size: 1.25rem; line-height: 1.75rem; }
                .font-semibold { font-weight: 600; }
                .text-gray-900 { color: #111827; }
                .dark\:text-white { color: #ffffff; }
                .text-sm { font-size: 0.875rem; line-height: 1.25rem; }
                .text-gray-500 { color: #6b7280; }
                .dark\:text-gray-400 { color: #9ca3af; }
                .bg-white { background-color: #ffffff; }
                .dark\:bg-gray-900 { background-color: #111827; }
                .py-12 { padding-top: 3rem; padding-bottom: 3rem; }
                .bg-gray-50 { background-color: #f9fafb; }
                .dark\:bg-gray-800 { background-color: #1f2937; }
                .mb-4 { margin-bottom: 1rem; }
                .text-2xl { font-size: 1.5rem; line-height: 2rem; }
                .space-x-6 > * + * { margin-left: 1.5rem; }
                .text-gray-400 { color: #9ca3af; }
                .hover\:text-gray-600:hover { color: #4b5563; }
                .dark\:hover\:text-gray-300:hover { color: #d1d5db; }
                .mt-8 { margin-top: 2rem; }
                .text-gray-500 { color: #6b7280; }
                .dark\:text-gray-400 { color: #9ca3af; }
            </style>
        @endif
    </head>
    <body class="text-gray-900 bg-white dark:bg-gray-900 dark:text-white">
        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between py-4">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">
                            BossPlatform
                        </h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        @auth
                            <a href="{{ url('/admin') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                                Admin
                            </a>
                        @else
                            @if (Route::has('register.tenant'))
                                <a href="{{ route('register.tenant') }}" class="px-4 py-2 text-white transition-colors bg-indigo-600 rounded-md hover:bg-indigo-700">
                                    Inizia Gratis
                                </a>
                            @else
                                <a href="{{ url('/admin') }}" class="px-4 py-2 text-white transition-colors bg-indigo-600 rounded-md hover:bg-indigo-700">
                                    Accedi
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="py-20 bg-gradient-to-br from-indigo-50 to-blue-50 dark:from-gray-900 dark:to-gray-800">
            <div class="px-4 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
                <h1 class="mb-6 text-5xl font-bold text-gray-900 md:text-6xl dark:text-white">
                    Automazione Intelligente per la
                    <span class="text-indigo-600 dark:text-indigo-400">Tua Azienda</span>
                </h1>
                <p class="max-w-3xl mx-auto mb-8 text-xl text-gray-600 dark:text-gray-300">
                    Connetti le tue app, automatizza i processi e trasforma il modo in cui lavori.
                    BossPlatform ti permette di creare flussi di lavoro potenti senza scrivere una riga di codice.
                </p>

                <!-- Quick Access Section -->
                @if (Route::has('go.to.tenant'))
                    <div class="max-w-md mx-auto mb-8">
                        <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                            @if (session('error'))
                                <div class="p-3 mb-4 text-sm text-red-700 bg-red-100 border border-red-400 rounded dark:bg-red-900 dark:text-red-400">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">
                                Hai già un tenant?
                            </h3>
                            <form action="{{ route('go.to.tenant') }}" method="GET" class="space-y-4">
                                <div>
                                    <label for="tenant-domain" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Dominio del tuo tenant
                                    </label>
                                    <div class="flex mt-1">
                                        <input
                                            type="text"
                                            id="tenant-domain"
                                            name="domain"
                                            placeholder="mio-tenant"
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        >
                                        <span class="inline-flex items-center px-3 py-2 text-sm text-gray-500 bg-gray-50 border border-l-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">
                                            .bossnew.ddev.site
                                        </span>
                                    </div>
                                </div>
                                <button
                                    type="submit"
                                    class="w-full px-4 py-2 text-white transition-colors bg-indigo-600 rounded-md hover:bg-indigo-700"
                                >
                                    Vai al mio tenant
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

                <div class="flex flex-col justify-center gap-4 sm:flex-row">
                    @if (Route::has('register.tenant'))
                        <a href="{{ route('register.tenant') }}" class="px-8 py-4 text-lg font-semibold text-white transition-colors bg-indigo-600 rounded-lg hover:bg-indigo-700">
                            Inizia Gratis
                        </a>
                    @else
                        <a href="{{ url('/admin') }}" class="px-8 py-4 text-lg font-semibold text-white transition-colors bg-indigo-600 rounded-lg hover:bg-indigo-700">
                            Accedi
                        </a>
                    @endif
                    <a href="#features" class="px-8 py-4 text-lg font-semibold text-gray-700 transition-colors border border-gray-300 rounded-lg dark:border-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800">
                        Scopri di Più
                    </a>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-20 bg-white dark:bg-gray-900">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="mb-16 text-center">
                    <h2 class="mb-4 text-4xl font-bold text-gray-900 dark:text-white">
                        Potenza e Semplicità
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        Tutto quello che ti serve per automatizzare i tuoi processi aziendali
                    </p>
                </div>

                <div class="grid gap-8 md:grid-cols-3">
                    <!-- Feature 1 -->
                    <div class="p-6 text-center">
                        <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-indigo-100 rounded-full dark:bg-indigo-900">
                            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Integrazione Facile</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Connetti oltre 1000 app e servizi con pochi clic. Nessuna configurazione complessa richiesta.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="p-6 text-center">
                        <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-indigo-100 rounded-full dark:bg-indigo-900">
                            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Automazione Intelligente</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Crea flussi di lavoro complessi con il nostro editor drag-and-drop intuitivo.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="p-6 text-center">
                        <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-indigo-100 rounded-full dark:bg-indigo-900">
                            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Analisi Avanzate</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Monitora le performance dei tuoi automi con dashboard dettagliate e report in tempo reale.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 bg-indigo-600 dark:bg-indigo-700">
            <div class="px-4 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
                <h2 class="mb-4 text-4xl font-bold text-white">
                    Pronto a Trasformare la Tua Azienda?
                </h2>
                <p class="mb-8 text-xl text-indigo-100">
                    Unisciti a migliaia di aziende che hanno già automatizzato i loro processi con BossPlatform
                </p>
                @if (Route::has('register.tenant'))
                    <a href="{{ route('register.tenant') }}" class="px-8 py-4 text-lg font-semibold text-indigo-600 transition-colors bg-white rounded-lg hover:bg-gray-100">
                        Inizia Ora - È Gratis
                    </a>
                @else
                    <a href="{{ url('/admin') }}" class="px-8 py-4 text-lg font-semibold text-indigo-600 transition-colors bg-white rounded-lg hover:bg-gray-100">
                        Accedi Ora
                    </a>
                @endif
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 bg-gray-50 dark:bg-gray-800">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="text-center">
                    <h3 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">BossPlatform</h3>
                    <p class="mb-4 text-gray-600 dark:text-gray-300">
                        Automazione intelligente per aziende moderne
                    </p>
                    <div class="flex justify-center space-x-6">
                        <a href="#" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                            <span class="sr-only">Twitter</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                            <span class="sr-only">LinkedIn</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"></path>
                            </svg>
                        </a>
                    </div>
                    <p class="mt-8 text-gray-500 dark:text-gray-400">
                        &copy; {{ date('Y') }} BossPlatform. Tutti i diritti riservati.
                    </p>
                </div>
            </div>
        </footer>
    </body>
</html>
