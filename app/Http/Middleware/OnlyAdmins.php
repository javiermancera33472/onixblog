<?php namespace App\Http\Middleware;

use Closure;

class OnlyAdmins {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
            if (!\Auth::user()->is('admins'))
            {
                return redirect("members");
            }
            return $next($request);
	}

}
