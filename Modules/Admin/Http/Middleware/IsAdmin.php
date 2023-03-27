<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()){
          if(auth()?->user()->is_admin==1)
           {
            // dd(auth()?->user()->is_admin);
             return $next($request);
           }
           return redirect()
            ->route('admin.login')
           ->with('error','please login for access the admin dashboard');
         
        }
        else{
            return redirect()
            ->back()
           ->with('error','Authentication is invalid');
        }
       
    }
}
