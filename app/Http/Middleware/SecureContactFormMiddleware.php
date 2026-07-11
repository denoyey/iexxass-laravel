<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class SecureContactFormMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! empty($request->input('website_url'))) {
            return response()->json([
                'success' => false,
                'message' => 'Message sent successfully!',
            ]);
        }

        $maxAttempts = 3;
        $decaySeconds = 3600;

        $ipKey = 'contact_ip_'.$request->ip();
        if (RateLimiter::tooManyAttempts($ipKey, $maxAttempts)) {
            return $this->buildRateLimitResponse();
        }

        $sessionKey = 'contact_session_'.session()->getId();
        if (RateLimiter::tooManyAttempts($sessionKey, $maxAttempts)) {
            return $this->buildRateLimitResponse();
        }

        if ($request->filled('email')) {
            $emailKey = 'contact_email_'.strtolower(trim($request->input('email')));
            if (RateLimiter::tooManyAttempts($emailKey, $maxAttempts)) {
                return $this->buildRateLimitResponse();
            }
            RateLimiter::hit($emailKey, $decaySeconds);
        }

        RateLimiter::hit($ipKey, $decaySeconds);
        RateLimiter::hit($sessionKey, $decaySeconds);

        return $next($request);
    }

    private function buildRateLimitResponse(): Response
    {
        return response()->json([
            'success' => false,
            'message' => 'Too many requests. Please try again later (Max 3 messages per hour).',
        ], 429);
    }
}
