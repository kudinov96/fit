<?php

namespace App\Http\Middleware;

use App\Enums\ResultTypeEnum;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanShowMarathon
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User $user */
        $user = $request->user();

        $firstQuizExists = $user
            ->firstQuiz()
            ->exists();

        $startResultExists = $user
            ->results()
            ->where("type", ResultTypeEnum::START)
            ->exists();

        if (!$firstQuizExists) {
            if (strpos($request->getRequestUri(), "/first-quiz") === false) {
                return redirect("first-quiz");
            }
        }

        if (!$startResultExists) {
            if (strpos($request->getRequestUri(), "/marathon/before") === false && strpos($request->getRequestUri(), "/first-quiz")) {
                return redirect("marathon/before");
            }
        }

        return $next($request);
    }
}
