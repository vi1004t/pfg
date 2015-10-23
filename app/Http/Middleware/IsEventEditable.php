<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use App\Cultiu;
use App\Event;
class IsEventEditable {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//dd($cultiu);
		dd(Cultiu::esEditable(Event::cultiuEvent(app()->router->getCurrentRoute()->getParameter('event'))));
		if (Cultiu::esEditable(Event::cultiuEvent(app()->router->getCurrentRoute()->getParameter('event')))){
			return $next($request);
		}
		else{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				//return new RedirectResponse(url('/home'));
				return redirect()->back();
			}
		}
	}

}
