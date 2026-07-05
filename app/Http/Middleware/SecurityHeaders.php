<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (method_exists($response, 'header')) {
            $response->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
            $response->header('Cross-Origin-Opener-Policy', 'same-origin');
            $response->header('X-Frame-Options', 'SAMEORIGIN');
            $response->header('X-Content-Type-Options', 'nosniff');

            $csp = "default-src 'self'; ".
                   "script-src 'self' 'unsafe-inline' 'unsafe-eval' http://127.0.0.1:5173 http://localhost:5173 https://cdnjs.cloudflare.com https://www.google.com/recaptcha/ https://www.gstatic.com/recaptcha/; ".
                   "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com http://127.0.0.1:5173 http://localhost:5173; ".
                   "font-src 'self' data: https://fonts.gstatic.com http://127.0.0.1:5173 http://localhost:5173; ".
                   "img-src 'self' data: blob: https://*.tile.openstreetmap.org https://tile.openstreetmap.org http://127.0.0.1:5173 http://localhost:5173; ".
                   "connect-src 'self' ws://127.0.0.1:5173 ws://localhost:5173; ".
                   "frame-src 'self' https://www.google.com/recaptcha/; ".
                   "worker-src 'self' blob:; ".
                   "frame-ancestors 'none'; ".
                   "require-trusted-types-for 'script';";
            $response->header('Content-Security-Policy', $csp);
        }

        return $response;
    }
}
