<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultRequest;
use App\Models\User;
use App\Services\ResultService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ResultController extends Controller
{
    public function before(): Response
    {
        /** @var User $user */
        $user = auth()->user();

        return response()->view("result.before", [
            "user" => $user,
        ]);
    }

    public function store(ResultRequest $request, ResultService $resultService): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $resultService->store(
            $request->all(),
            $user,
        );

        return redirect()->to('/marathon/1?modal=thanksModal');
    }
}
