<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (!$user->is_active || $user->is_pending) {
            Auth::logout(); // Opcional: força logout
            return redirect()->route('login')->withErrors([
                'form.email' => 'Sua conta está inativa ou pendente de aprovação.',
            ]);
        }

        return $next($request);
    }
}
