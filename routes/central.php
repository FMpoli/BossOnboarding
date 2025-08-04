<?php

use Base33\BossOnboarding\Http\Controllers\TenantRegistrationController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    // Tenant Registration Routes (only for central app)
    Route::get('/register', [TenantRegistrationController::class, 'create'])->name('register.tenant');
    Route::post('/register-tenant', [TenantRegistrationController::class, 'store'])->name('tenant.register.store');
    Route::get('/register/success', [TenantRegistrationController::class, 'success'])->name('register.success');

    // Route per redirect al tenant
    Route::get('/go-to-tenant', function () {
        $domain = request()->get('domain');
        $domainSuffix = config('bossonboarding.default_domain_suffix', 'bossnew.ddev.site');

        if (!$domain) {
            return redirect('/')->with('error', 'Dominio tenant richiesto');
        }

        // Check if tenant exists
        $tenant = \App\Models\Tenant::where('domain', $domain)->first();

        if (!$tenant) {
            // Redirect to tenant-not-found page with the attempted domain
            return redirect()->route('tenant.not.found', ['domain' => $domain]);
        }

        // Costruisci l'URL del tenant
        $tenantUrl = 'https://' . $domain . '.' . $domainSuffix;

        return redirect($tenantUrl);
    })->name('go.to.tenant');

    // Route per pagina tenant non trovato
    Route::get('/tenant-not-found', function () {
        return view('bossonboarding::tenant-not-found');
    })->name('tenant.not.found');
});
