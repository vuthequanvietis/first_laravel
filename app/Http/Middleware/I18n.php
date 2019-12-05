<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
class I18n
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
        $language = \Session::get('lang', config('app.locale'));
        config(['app.locale' => $language]);
        App::setLocale($language);
        return $next($request);
    }
}
