<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InjectRecaptchaScript
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only inject on HTML responses
        if (method_exists($response, 'getContent') && str_contains($response->headers->get('Content-Type') ?? '', 'text/html')) {
            $content = $response->getContent();

            $trustedTypesScript = <<<'HTML'
<script>
    if (window.trustedTypes && trustedTypes.createPolicy) {
        trustedTypes.createPolicy('default', {
            createHTML: (string) => string,
            createScriptURL: (string) => string,
            createScript: (string) => string,
        });
    }
</script>
HTML;

            $recaptchaScript = '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';

            // Inject Trusted Types policy right after <head>
            if (str_contains($content, '<head>')) {
                $content = str_replace('<head>', "<head>\n".$trustedTypesScript, $content);
            }

            // Inject script right before closing body tag
            if (str_contains($content, '</body>')) {
                $content = str_replace('</body>', $recaptchaScript."\n</body>", $content);
            }

            $response->setContent($content);
        }

        return $response;
    }
}
