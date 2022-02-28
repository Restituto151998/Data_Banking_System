<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Type as Middleware;
use Illuminate\Support\Facades\Auth;

class Type {

  public function handle($request, Closure $next, String $type) {
    if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
      return redirect('/login');

    $user = Auth::user();
    if($user->type == $type)
      return $next($request);

    return redirect('/login');
  }
}