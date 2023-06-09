<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
            if( Auth::check() )
            {
                /** @var User $user */
                $user = Auth::user();
                if ( $user->hasRole('admin') ) {
                    return $next($request);
                  }
            }
            $request->session()->invalidate();

            $request->session()->regenerateToken();
            abort(403, 'Unauthorized.');
          }

}
