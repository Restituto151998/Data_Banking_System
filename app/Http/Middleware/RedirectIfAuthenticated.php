<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ResortList;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
          $type = Auth::user()->type; 

          if(Auth::user()->status == 'disable'){
            
    Auth::logout();
          
          }
             
          switch ($type) {
            case 'ADMIN':
               return redirect('/admin_dashboard');
               break;
            case 'STAFF':
               return redirect('/staff_dashboard');
               break; 
      
            default:
               return redirect('/home'); 
               break;
          }
        }
        return $next($request);
      }
}
