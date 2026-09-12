<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth('admin')->check()) {
            return redirect()->route('admin.login')
                ->withErrors(['username' => 'Silakan login sebagai admin terlebih dahulu.']);
        }

        return $next($request);
    }
}
