<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckInRequest;
use App\Models\CheckIn;
use App\Models\User;
use App\Services\CheckInService;
use App\Services\ResultService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CheckInController extends Controller
{
    public function index(ResultService $resultService): Response
    {
        /** @var User $user */
        $user = auth()->user();

        return response()->view("check-in", [
            "stream" => $user->stream,
            "weeks" => $resultService->weeksWithResults($user),
        ]);
    }

    public function store(CheckInRequest $request, CheckInService $checkInService): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $checkInService->store($request->all(), $user);

        return redirect()->to('/check-in?modal=reportThanks');
    }

    public function update(CheckInRequest $request, CheckInService $checkInService): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();
        $checkIn = CheckIn::query()->find($request->input("check_in_id"));

        $checkInService->store($request->all(), $user, $checkIn);

        return redirect()->to('/check-in?modal=reportThanks');
    }
}
