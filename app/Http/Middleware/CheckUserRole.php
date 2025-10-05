<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('auth.login');
        }

        $user = Auth::user();

        if ($user->role == $role){
            return $next($request);
        }
        if ($user->role == 'provider'){
            return redirect()->route('/')->with('error', 'Accès refusé. Vous devez être un Prestataire pour accéder à cette page.') ;
        }
        return redirect()->route('/')->with('error', 'Accès refusé. Vous devez être un Client pour accéder à cette page.') ;
    }
}
