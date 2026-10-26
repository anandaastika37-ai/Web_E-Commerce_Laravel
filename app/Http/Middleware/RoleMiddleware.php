<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{

    public function handle(Request $request, Closure $next , string ...$roles): Response
    {
        $user = $request->user();

        if(! $user || ! $user->hasRole(...$roles)){
            abort(403 , 'Anda Tidak Punya Akses Ke Halaman Ini');
        }
        return  $next($request);
    }
}
