<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione Tenant</title>
    @livewireStyles

    <!-- Filament Schemas CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bossonboarding/css/app.css') }}">
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Register</h1>

        @livewire('register-tenant')
    </div>

    @livewireScripts

    <!-- Filament Schemas JS -->
    <script src="{{ asset('js/filament/schemas/schemas.js') }}"></script>
</body>
</html>
