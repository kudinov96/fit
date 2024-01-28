<?php

namespace App\Http\Controllers;

use App\Enums\ResultTypeEnum;
use App\Http\Requests\CheckInRequest;
use App\Models\CheckIn;
use App\Models\User;
use App\Services\CheckInService;
use App\Services\StreamService;
use Illuminate\Http\RedirectResponse;
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

            $weekItem->put("number", $week);
            $weekItem->put("reportHasBeenSent", $user->results()
                ->where("stream_id", $user->stream_id)
                ->where("type", constant(ResultTypeEnum::class . "::" . "WEEK_" . $week))
                ->exists());
            $weekItem->put("nowMoreFriday", now() >= $user->stream->start_date->addWeeks($week - 1)->addDays(5));

            $weekItem->put("days", $streamService->daysWithDateByWeek($user->stream, $week, $user));

            $weeks->put("week" . $week, $weekItem);
        }

        return response()->view("check-in", [
            "weeks" => $weeks,
        ]);
    }

    public function store(CheckInRequest $request, CheckInService $checkInService): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $checkInService->store($request->all(), $user);

        return response()->redirectToRoute("check-in.index");
    }

    public function update(CheckInRequest $request, CheckInService $checkInService): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();
        $checkIn = CheckIn::query()->find($request->input("check_in_id"));

        $checkInService->store($request->all(), $user, $checkIn);

        return response()->redirectToRoute("check-in.index");
    }
}
