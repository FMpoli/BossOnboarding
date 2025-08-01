@extends('bossonboarding::layouts.app')

@section('auth-layout')
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
@endsection
