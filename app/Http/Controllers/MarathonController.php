<?php

namespace App\Http\Controllers;

use App\Enums\TrainingWhereEnum;
use App\Models\Training;
use App\Models\User;
use App\Services\StreamService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class MarathonController extends Controller
{
    public function index(StreamService $streamService): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();
        $currentWeek = $streamService->currentWeekStream($user->stream);
        $week = $currentWeek > 6 ? 6 : $currentWeek;

        return response()->redirectToRoute("marathon.index.week", [
            "week" => $week,
        ]);
    }

    public function indexWeek(int $week, StreamService $streamService): Response
    {
        if ($week > 6 || $week < 1) {
            abort(404);
        }

        /** @var User $user */
        $user = auth()->user();
        $currentWeek = $streamService->currentWeekStream($user->stream);

        // Если марафон в будущем
        if ($user->stream->start_date > now()) {
            $currentWeek = 0;
        }

        $trainingsHome = collect();
        for ($day = 1; $day <= 5; $day++) {
            $trainingsDay = Training::query()
                ->whereJsonContains("weeks", (string) $week)
                ->where("day", $day)
                ->where("where", TrainingWhereEnum::HOME)
                ->get();

            $trainingsHome->put("day{$day}", $trainingsDay);
        }

        $trainingsGym = collect();
        for ($day = 1; $day <= 5; $day++) {
            $trainingsDay = Training::query()
                ->whereJsonContains("weeks", (string) $week)
                ->where("day", $day)
                ->where("where", TrainingWhereEnum::GYM)
                ->get();

            $trainingsGym->put("day{$day}", $trainingsDay);
        }

        return response()->view("marathon.index-week", [
            "week" => $week,
            "currentWeek" => $currentWeek,
            "trainingsHome" => $trainingsHome,
            "trainingsGym" => $trainingsGym,
        ]);
    }
}
