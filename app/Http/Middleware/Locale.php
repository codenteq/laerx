<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $language = cache()->remember('language', 60, function () {
            return Language::find(languageId());
        });
        App::setLocale($language->code);

        return $next($request);
    }
}
