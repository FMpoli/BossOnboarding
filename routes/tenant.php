<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::get('/', function () {
        $host = request()->getHost();
        \Log::info('Tenant Route: Host = ' . $host);

        $domainSuffix = config('bossonboarding.default_domain_suffix');
        \Log::info('Tenant Route: Domain Suffix = ' . $domainSuffix);

        // Extract tenant domain from host
        $tenantDomain = str_replace('.'.$domainSuffix, '', $host);
        \Log::info('Tenant Route: Tenant Domain = ' . $tenantDomain);

        // Handle case where host is exactly the domain suffix (central domain)
        if ($host === $domainSuffix) {
            return redirect()->route('admin.login');
        }

        // Check if tenant exists in database
        $tenant = \App\Models\Tenant::where('domain', $tenantDomain)->first();
        \Log::info('Tenant Route: Tenant found = ' . ($tenant ? 'true' : 'false'));

        if (! $tenant) {
            return view('bossonboarding::tenant-not-found');
        }

        return view('bossonboarding::tenant-welcome');
    })->name('tenant.welcome');
});
