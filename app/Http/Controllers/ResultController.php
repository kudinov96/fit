<?php

namespace App\Http\Controllers;

use App\Enums\ResultTypeEnum;
use App\Http\Requests\ResultRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Models\User;
use App\Services\ResultService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ResultController extends Controller
{
    public function index(): Response
    {
        /** @var User $user */
        $user = auth()->user();
        if (!$user->stream->access_to_results) {
            abort(403);
        }

        return response()->view("result.index", [
            "user" => $user,
            "resultStart" => $user->results->where("type", ResultTypeEnum::START)->first(),
            "resultWeek1" => $user->results->where("type", ResultTypeEnum::WEEK_1)->first(),
            "resultWeek2" => $user->results->where("type", ResultTypeEnum::WEEK_2)->first(),
            "resultWeek3" => $user->results->where("type", ResultTypeEnum::WEEK_3)->first(),
            "resultWeek4" => $user->results->where("type", ResultTypeEnum::WEEK_4)->first(),
            "resultWeek5" => $user->results->where("type", ResultTypeEnum::WEEK_5)->first(),
            "resultWeek6" => $user->results->where("type", ResultTypeEnum::WEEK_6)->first(),
        ]);
    }

    public function before(): Response
    {
        /** @var User $user */
        $user = auth()->user();
        if (!$user->stream->access_to_results) {
            abort(403);
        }

        return response()->view("result.before", [
            "user" => $user,
        ]);
    }

    public function store(ResultRequest $request, ResultService $resultService): RedirectResponse
    {
        /** @var User $user */
        /*$user = auth()->user();
        if (!$user->stream->access_to_results) {
            abort(403);
        }*/

        $resultService->store(
            $request->all(),
            $user,
        );

        if ($request->input("type") === ResultTypeEnum::START->value) {
            return redirect()->to('/marathon/1?modal=thanksModal');
        }

        if ($request->input("type") === ResultTypeEnum::WEEK_6->value) {
            return redirect()->to('/check-in?modal=finalModal');
        }

        return redirect()->to('/check-in?modal=thanks_weekModal');
    }

    public function updatePhoto(UpdatePhotoRequest $request, ResultService $resultService): RedirectResponse
    {
        /** @var User $user */
        /*$user = auth()->user();
        if (!$user->stream->access_to_results) {
            abort(403);
        }*/

        $resultService->updatePhoto(
            $request->all(),
            $user,
        );

        return redirect()->to('/results?modal=thanksModal');
    }
}
