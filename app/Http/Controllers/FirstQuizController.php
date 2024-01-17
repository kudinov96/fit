<?php

namespace App\Http\Controllers;

use App\Http\Requests\FirstQuizRequest;
use App\Models\User;
use App\Services\FirstQuizService;

class FirstQuizController extends Controller
{
    public function store(FirstQuizRequest $request, FirstQuizService $firstQuizService)
    {
        /** @var User $user */
        $user = auth()->user();

        $user->update([
            "language" => $request->input("language"),
        ]);

        $firstQuizService->store(
            $request->all(),
            $user,
        );
    }
}
