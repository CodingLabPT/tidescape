<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if (in_array($locale, config('app.locales'))) {
            App::setLocale($locale);
        } else {
            // Caso o locale não seja suportado, defina o padrão.
            App::setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
