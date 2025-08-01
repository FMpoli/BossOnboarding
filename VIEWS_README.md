# BossOnboarding Views

Questo documento descrive i layout e le viste disponibili nel plugin BossOnboarding.

## Layout Disponibili

### 1. Layout Base (`layouts/app.blade.php`)

Il layout base fornisce la struttura HTML completa con:

-   Meta tags appropriati
-   Font Inter da Google Fonts
-   Supporto per Vite e asset Filament
-   Header, main content e footer
-   Supporto per dark mode
-   Responsive design

**Sezioni disponibili:**

-   `@section('title')` - Titolo della pagina
-   `@section('app-name')` - Nome dell'applicazione nell'header
-   `@section('header')` - Header personalizzato
-   `@section('header-nav')` - Navigazione nell'header
-   `@section('content')` - Contenuto principale con layout personalizzato
-   `@section('main')` - Contenuto principale con layout standard
-   `@section('footer')` - Footer personalizzato
-   `@stack('styles')` - CSS aggiuntivo
-   `@stack('scripts')` - JavaScript aggiuntivo

### 2. Layout Auth (`layouts/auth.blade.php`)

Layout specializzato per le pagine di autenticazione che estende il layout base:

-   Design centrato e pulito
-   Form di autenticazione ottimizzato
-   Supporto per brand personalizzato
-   Link di navigazione tra pagine auth

**Sezioni disponibili:**

-   `@section('auth-title')` - Titolo della pagina di autenticazione
-   `@section('brand')` - Brand/logo personalizzato
-   `@section('auth-content')` - Contenuto del form di autenticazione
-   `@section('auth-links')` - Link aggiuntivi (es. "Torna al login")

## Viste Disponibili

### Pagine di Autenticazione

1. **`login.blade.php`** - Pagina di login
2. **`register.blade.php`** - Pagina di registrazione tenant
3. **`forgot-password.blade.php`** - Pagina password dimenticata
4. **`reset-password.blade.php`** - Pagina reset password

### Pagine di Sistema

1. **`register-tenant-success.blade.php`** - Pagina di successo registrazione
2. **`tenant-welcome.blade.php`** - Pagina di benvenuto tenant

## Utilizzo

### Estendere il Layout Base

```blade
@extends('bossonboarding::layouts.app')

@section('title', 'Il Mio Titolo')

@section('main')
    <div class="text-center">
        <h1>Il Mio Contenuto</h1>
    </div>
@endsection
```

### Estendere il Layout Auth

```blade
@extends('bossonboarding::layouts.auth')

@section('title', 'Login')

@section('auth-title', 'Accedi al tuo account')

@section('auth-content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Campi del form -->
    </form>
@endsection

@section('auth-links')
    <p>Non hai un account? <a href="{{ route('register') }}">Registrati</a></p>
@endsection
```

## Pubblicazione delle Viste

Per pubblicare le viste del plugin nell'applicazione principale:

```bash
ddev artisan bossonboarding:publish-views
```

Opzioni disponibili:

-   `--force` - Sovrascrive i file esistenti senza chiedere conferma

Le viste verranno pubblicate in `resources/views/vendor/bossonboarding/`.

## Personalizzazione

### Brand Personalizzato

```blade
@section('brand')
    <div class="mx-auto h-16 w-16">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-full w-full object-contain">
    </div>
    <h2 class="mt-6 text-3xl font-extrabold text-gray-900 dark:text-white">
        Il Mio Brand
    </h2>
@endsection
```

### Stili Aggiuntivi

```blade
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush
```

### Script Aggiuntivi

```blade
@push('scripts')
    <script src="{{ asset('js/custom.js') }}"></script>
@endpush
```

## Compatibilità

-   **Laravel**: 10.x+
-   **Filament**: 4.x
-   **Livewire**: 3.x
-   **Tailwind CSS**: 3.x

## Note

-   Tutte le viste supportano la dark mode
-   I layout sono completamente responsive
-   Compatibili con Filament 4 e Livewire 3
-   Utilizzano il font Inter per una migliore leggibilità
