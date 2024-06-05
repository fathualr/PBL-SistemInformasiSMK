<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin;

class AdminRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $admin = Admin::where('id_admin', Auth::id())->first();

            if ($admin && $admin->role === 'Master') {
                return $next($request);
            }
        }

        return back()->with('error', 'You do not have permission to access this page.');
    }
}
