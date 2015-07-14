<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use App\UserProfile;
class IsUser {

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
	//	dd("hola");
	//	dd(app()->router->getCurrentRoute()->getParameter('perfil'));
		//dd($this->auth->user()->id);
//dd(UserProfile::perfilId($this->auth->user()->id));
		if (UserProfile::perfilId($this->auth->user()->id) === app()->router->getCurrentRoute()->getParameter('perfil')){
			return $next($request);
		}
		else{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				//dd("NO");
				//return redirect()->guest('/');
				return new RedirectResponse(url('/perfil/'. UserProfile::perfilId($this->auth->user()->id)));
			}
		}
	}

}
