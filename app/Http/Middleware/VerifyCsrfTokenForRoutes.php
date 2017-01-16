<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfTokenForRoutes extends BaseVerifier
{

    protected $excludeRoutes = [
        'get_schedule',
        'upload'
//        'save_product'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        foreach ($this->excludeRoutes as $route)
            if($request->route()->getName() == $route)
                return $next($request);

        return parent::handle($request, $next);
    }
}