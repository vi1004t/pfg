<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
class IsCampDefined {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (\Input::get('id')){
			return $next($request);
		}
		else{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return new RedirectResponse(url('/home'));
			}
		}
	}

}
