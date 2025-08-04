<?php

namespace Base33\BossOnboarding\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Tenant404Middleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Se la risposta è un 404 e siamo su un dominio tenant
        if ($response->getStatusCode() === 404) {
            $host = $request->getHost();
            $centralDomains = ['boss.ddev.site', 'bossnew.ddev.site'];

            if (!in_array($host, $centralDomains)) {
                return response()->view('bossonboarding::tenant-404', [], 404);
            }
        }

        return $response;
    }
}
