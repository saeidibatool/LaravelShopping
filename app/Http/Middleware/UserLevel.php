<?php

namespace App\Http\Middleware;

use Closure;

class UserLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $roles = auth()->user()->roles()->orderBy('name')->get()->all();

        if(auth()->check()){
          foreach ($roles as $role) {

            if($role['name']=='admin'){
                return $next($request);
            }
          }
          return redirect(route('userpanel'));
        }


    }
}
