<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $url = $request->route('url');

        // in case year is not numeric go to homepage
        if(isset($url) && !is_numeric($url)){
            return redirect('/')
                ->with('error', 'La URL no es válida. Redirigiendo a la página principal.');
        }
        return $next($request);
    }
}
