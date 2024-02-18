<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Symfony\Component\HttpFoundation\Response;

class UnverifiedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() instanceof MustVerifyEmail && $request->user()->hasVerifiedEmail()) {
            return redirect('/Dashboard'); // Redirect ke halaman utama jika sudah terverifikasi
        }

        return $next($request);
    }
}
