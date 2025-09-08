<?php

namespace Base33\BossOnboarding\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;

class CentralAppMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();
        $centralDomains = config('app.central_domains');
        $domainSuffix = config('bossonboarding.default_domain_suffix');

        // Se siamo su un dominio centrale
        if (in_array($host, $centralDomains)) {
            // Route per redirect al tenant
            if ($request->is('go-to-tenant')) {
                $domain = $request->get('domain');

                if (! $domain) {
                    return redirect('/')->with('error', 'Dominio tenant richiesto');
                }

                // Check if tenant exists
                $tenant = Tenant::where('domain', $domain)->first();

                if (! $tenant) {
                    // Redirect to tenant-not-found page with the attempted domain
                    return redirect()->route('tenant.not.found', ['domain' => $domain]);
                }

                // Costruisci l'URL del tenant
                $tenantUrl = 'https://'.$domain.'.'.$domainSuffix;

                return redirect($tenantUrl);
            }

            // Route per pagina tenant non trovato
            if ($request->is('tenant-not-found')) {
                return view('bossonboarding::tenant-not-found');
            }

            // Route di fallback per la central app
            if ($request->is('*') && ! $request->is('admin/*') && ! $request->is('register*') && ! $request->is('go-to-tenant') && ! $request->is('tenant-not-found')) {
                return response('Pagina non trovata', 404);
            }
        } else {
            // Se siamo su un dominio tenant
            if ($request->is('/')) {
                // Extract tenant domain from host
                $tenantDomain = str_replace('.'.$domainSuffix, '', $host);

                // Check if tenant exists in database
                $tenant = Tenant::where('domain', $tenantDomain)->first();

                if (! $tenant) {
                    return view('bossonboarding::tenant-not-found');
                }

                return view('bossonboarding::tenant-welcome');
            }
        }

        return $next($request);
    }
}
