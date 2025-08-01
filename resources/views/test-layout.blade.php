@extends('bossonboarding::layouts.app')

@section('title', 'Test Layout')

@section('main')
    <div class="text-center">
        <h1 class="mb-4 text-3xl font-bold text-gray-900 dark:text-white">
            Layout funzionante! 🎉
        </h1>
        <p class="mb-8 text-lg text-gray-600 dark:text-gray-400">
            Se vedi questa pagina con gli stili corretti, il layout funziona.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-2xl mx-auto">
            <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                    Test Stili
                </h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Questa card dimostra che Tailwind CSS funziona correttamente.
                </p>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Pulsante Test
                </button>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                    Link di Test
                </h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Verifica che i link funzionino correttamente.
                </p>
                <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 text-white transition-colors bg-indigo-600 rounded-lg hover:bg-indigo-700">
                    Vai al Login
                </a>
            </div>
        </div>
    </div>
@endsection
