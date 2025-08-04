<?php

namespace Base33\BossOnboarding\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Tenant;

class EnsureTenantExists
{
    public function handle(Request $request, Closure $next)
    {
        // Extract tenant domain from host
        $host = $request->getHost();
        $domainSuffix = config('bossonboarding.default_domain_suffix');

        // If we're on the central domain, allow registration routes
        if ($host === $domainSuffix) {
            return $next($request);
        }

        $tenantDomain = str_replace('.' . $domainSuffix, '', $host);

        // Check if tenant exists in database
        $tenant = Tenant::where('domain', $tenantDomain)->first();

        if (!$tenant) {
            return view('bossonboarding::tenant-not-found');
        }

        return $next($request);
    }
}
