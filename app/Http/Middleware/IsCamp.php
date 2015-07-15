<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use App\UserProfile;
use App\Camp;
class IsCamp {

	public function __construct(Guard $auth){

		$this->auth = $auth;

	}
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (UserProfile::perfilId($this->auth->user()->id) === Camp::perfilId(app()->router->getCurrentRoute()->getParameter('camp'))){
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
