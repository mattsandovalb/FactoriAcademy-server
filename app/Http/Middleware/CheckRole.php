<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login');
            }
            $user = Auth::user();
            if ($user->role != $role) {
            return redirect()->back()->with('error', 'You are not authorized to access this page');
            }
            return $next($request);
    }
 }
            
            
            
            
            