<?php

use App\Http\Middleware\IdleTimeoutMiddleware;
use App\Http\Middleware\InjectRecaptchaScript;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\PreventSpamSubmit;
use App\Http\Middleware\SecurityHeaders;
use App\Http\Middleware\SecurityHeadersMiddleware;
use App\Http\Middleware\SetLocale;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(SecurityHeadersMiddleware::class);
        $middleware->web(append: [
            AuthenticateSession::class,
            IdleTimeoutMiddleware::class,
        ]);
        $middleware->alias([
            'role' => RoleMiddleware::class,
            'permission' => PermissionMiddleware::class,
            'role_or_permission' => RoleOrPermissionMiddleware::class,
            'prevent-back-history' => PreventBackHistory::class,
            'prevent-spam' => PreventSpamSubmit::class,
        ]);
        $middleware->redirectTo(
            guests: '/ix-core/login',
            users: '/ix-core/dashboard'
        );
        $middleware->web(
            append: [
                SetLocale::class,
                SecurityHeaders::class,
                InjectRecaptchaScript::class,
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->renderable(function (UnauthorizedException $e, Request $request) {
            if ($request->is('ix-core') || $request->is('ix-core/*')) {
                $required = $e->getRequiredPermissions();
                if (is_array($required) && in_array('access_admin_panel', $required)) {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();

                    return redirect()->route('admin.login')->withErrors([
                        'email' => 'Akun Anda tidak memiliki akses ke portal admin.',
                    ]);
                }

                return response()->view('errors.403-admin', ['exception' => $e], 403);
            }
        });
        //
    })->create();
