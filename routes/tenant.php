<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::get('/', function () {
        $host = request()->getHost();
        $domainSuffix = config('bossonboarding.default_domain_suffix', 'bossnew.ddev.site');

        // Extract tenant domain from host
        $tenantDomain = str_replace('.'.$domainSuffix, '', $host);

        // Check if tenant exists in database
        $tenant = \App\Models\Tenant::where('domain', $tenantDomain)->first();

        if (! $tenant) {
            return view('bossonboarding::tenant-not-found');
        }

        return view('bossonboarding::tenant-welcome');
    })->name('tenant.welcome');
});
