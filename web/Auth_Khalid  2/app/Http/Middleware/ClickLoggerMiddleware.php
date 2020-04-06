<?php

namespace App\Http\Middleware;

use App\Events\Clicked;
use Closure;

class ClickLoggerMiddleware
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

        $source = $request->input('utm_source');
        if($source){
            event(new Clicked($source, $request->url(), $request->headers->get('referer')));
        }

        return $next($request);
    }
}
