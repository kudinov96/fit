<?php

namespace App\Http\Controllers;

use App\Enums\ResultTypeEnum;
use App\Models\User;
use App\Services\StreamService;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class CheckInController extends Controller
{
    public function index(StreamService $streamService): Response
    {
        /** @var User $user */
        $user = auth()->user();

        $weeks = new Collection();
        for ($week = 1; $week <= 6; $week++) {
            $weekItem = new Collection();

            $weekItem->put("reportHasBeenSent", $user->results()
                ->where("stream_id", $user->stream_id)
                ->where("type", constant(ResultTypeEnum::class . "::" . "WEEK_" . $week))
                ->exists());

            $weekItem->put("days", $streamService->daysWithDateByWeek($user->stream, $week, $user));

            $weeks->put("week" . $week, $weekItem);
        }

        return response()->view("check-in", [
            "weeks" => $weeks,
        ]);
    }
}
