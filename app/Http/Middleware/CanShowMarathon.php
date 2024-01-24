<?php

namespace App\Http\Middleware;

use App\Enums\ResultTypeEnum;
use App\Enums\RoleEnum;
use App\Models\User;
use App\Services\StreamService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanShowMarathon
{
    private StreamService $streamService;

    public function __construct(StreamService $streamService)
    {
        $this->streamService = $streamService;
    }

    public function handle(Request $request, Closure $next): Response
    {
        /** @var User $user */
        $user = $request->user();

        $currentStream = $this->streamService->currentStream();
        $stream = $user->stream;

        if ($user->hasRole(RoleEnum::ADMIN)) {
            return redirect(route("stream.index"));
        }

        // Если нет ни пройденного потока, ни текущего
        if (!$stream && !$currentStream) {
            abort(404);
        }

        $firstQuizExists = $user
            ->firstQuiz()
            ->exists();

        $startResultExists = $user
            ->results()
            ->where("type", ResultTypeEnum::START)
            ->exists();

        if (!$firstQuizExists) {
            if (strpos($request->getRequestUri(), "/first-quiz") === false) {
                return redirect(route("first_quiz.index"));
            }
        }

        if (!$startResultExists) {
            if (strpos($request->getRequestUri(), "/marathon/before") === false && strpos($request->getRequestUri(), "/first-quiz")) {
                return redirect(route("marathon.before"));
            }
        }

        return $next($request);
    }
}
