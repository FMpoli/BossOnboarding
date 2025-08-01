@extends('bossonboarding::layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900">
    <div class="w-full max-w-md space-y-8">
        <!-- Logo/Brand -->
        <div class="text-center">
            @hasSection('brand')
                @yield('brand')
            @else
                <div class="flex items-center justify-center w-16 h-16 mx-auto bg-blue-600 shadow-lg rounded-2xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h2 class="mt-8 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                    @yield('auth-title', 'Accedi')
                </h2>
                @hasSection('auth-subtitle')
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        @yield('auth-subtitle')
                    </p>
                @endif
            @endif
        </div>

        <!-- Auth Form -->
        <div class="p-8 bg-white border border-gray-100 shadow-2xl dark:bg-gray-800 rounded-3xl dark:border-gray-700">
            @yield('auth-content')
        </div>

        <!-- Additional Links -->
        @hasSection('auth-links')
            <div class="text-center">
                @yield('auth-links')
            </div>
        @endif
    </div>
</div>
@endsection
