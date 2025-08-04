<?php

namespace Base33\BossOnboarding\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UnifiedErrorHandler
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $response = $next($request);

            // Se la risposta è un 404, mostra la pagina 404 personalizzata
            if ($response->getStatusCode() === 404) {
                return response()->view('bossonboarding::errors.404', [], 404);
            }

            return $response;
        } catch (NotFoundHttpException $e) {
            // Gestisce le eccezioni 404
            return response()->view('bossonboarding::errors.404', [], 404);
        } catch (HttpException $e) {
            // Gestisce altre eccezioni HTTP
            return response()->view('bossonboarding::errors.404', [], $e->getStatusCode());
        } catch (\Exception $e) {
            // Gestisce tutte le altre eccezioni
            return response()->view('bossonboarding::errors.404', [], 500);
        }
    }

    public function terminate($request, $response)
    {
        // Gestisce anche le risposte che vengono generate dopo il middleware
        if ($response->getStatusCode() === 404) {
            return response()->view('bossonboarding::errors.404', [], 404);
        }
    }
}
