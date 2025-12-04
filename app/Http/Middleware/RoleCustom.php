<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCustom
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            // Kalau belum login
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Kalau user tidak punya salah satu role yang dibutuhkan
        if (!$user->hasAnyRole($roles)) {
            if ($user->hasRole('adminprodi') || $user->hasRole('mahasiswa') || $user->hasRole('dosen')) {
                return redirect()->route('dashboard.home');
            } else {
                return redirect()->route('login');
            }
        }

        return $next($request);
    }
}
