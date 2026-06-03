<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->session()->get('locale', 'vi');
        
        if (in_array($locale, ['vi', 'ja'])) {
            App::setLocale($locale);
        } else {
            App::setLocale('vi');
        }

        return $next($request);
    }
}