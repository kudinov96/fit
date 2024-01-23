<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $lang = $request->input('lang');

        if ($lang) {
            if ($user) {
                $user->update([
                    "language" => $lang,
                ]);
            }

            app()->setLocale($lang);
        } elseif($user) {
            app()->setLocale($user->language);
        }

        return $next($request);
    }
}
