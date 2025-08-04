<?php

namespace Base33\BossOnboarding\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;

class EnsureTenantExists
{
    public function handle(Request $request, Closure $next)
    {
        // Extract tenant domain from host
        $host = $request->getHost();
        $domainSuffix = config('bossonboarding.default_domain_suffix');

        // If we're on the central domain, allow all routes
        if ($host === $domainSuffix) {
            return $next($request);
        }

        // Check if this is a tenant subdomain
        if (!str_ends_with($host, '.' . $domainSuffix)) {
            return $next($request);
        }

        $tenantDomain = str_replace('.' . $domainSuffix, '', $host);

        // Check if tenant exists in database
        $tenant = Tenant::where('domain', $tenantDomain)->first();

        if (!$tenant) {
            // For any path on non-existent tenant domain, show tenant-not-found
            return view('bossonboarding::tenant-not-found');
        }

        return $next($request);
    }
}
