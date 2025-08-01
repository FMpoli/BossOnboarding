@extends('bossonboarding::layouts.auth')

@section('title', 'Registrazione Tenant')

@section('auth-title', 'Crea il tuo tenant')
@section('auth-subtitle', 'Registra un nuovo tenant per iniziare')

@section('auth-content')
    @livewire('register-tenant')
@endsection

@section('auth-links')
    <p class="text-sm text-gray-600 dark:text-gray-400">
        Hai già un account?
        <a href="{{ route('login') }}" class="font-semibold text-indigo-600 transition-colors duration-200 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
            Accedi qui
        </a>
    </p>
@endsection
