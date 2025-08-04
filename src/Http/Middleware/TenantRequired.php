<?php

namespace Base33\BossOnboarding\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TenantRequired
{
    public function handle(Request $request, Closure $next)
    {
        // Check if we're on a tenant domain
        $host = $request->getHost();
        $centralDomains = ['boss.ddev.site', 'bossnew.ddev.site'];

        // If we're on a central domain, allow the request
        if (in_array($host, $centralDomains)) {
            return $next($request);
        }

        // Extract tenant domain from host
        $subdomain = explode('.', $host)[0];

        // Check if tenant exists in database
        $tenant = \App\Models\Tenant::where('domain', $subdomain)->first();

        if (!$tenant) {
            // Per le route /app/*, controlla se sono route di autenticazione
            if ($request->is('app/*')) {
                // Se sono route di autenticazione di Filament, permette l'accesso
                if ($request->is('app/login') ||
                    $request->is('app/forgot-password') ||
                    $request->is('app/reset-password') ||
                    $request->is('app/verify-email') ||
                    $request->is('app/confirm-password')) {
                    return $next($request);
                }

                // Per le altre route /app/*, lancia un'eccezione
                abort(404, 'Tenant not found');
            }

            // Per tutte le altre route, permette il passaggio (la route root gestirà il caso)
            return $next($request);
        }

        return $next($request);
    }
}
