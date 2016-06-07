<?php namespace App\Http\Middleware;

use Closure;

class CheckForActiveMembers {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
        
        
	public function handle($request, Closure $next)
	{
            if (\Auth::check() && \Auth::user()->status != 1)
            {
                \Auth::logout();
                return redirect()->guest('auth/login');
            }
            if (\Auth::check() && \Auth::user()->user_type == 1 && config('jmSettings')['JM_IS_SITE_DOWN'])
            {
                \Auth::logout();
                return redirect()->guest('auth/login');
            }
            return $next($request);
	}

}
