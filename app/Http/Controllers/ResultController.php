<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultRequest;
use App\Models\User;
use App\Services\ResultService;

class ResultController extends Controller
{
    public function store(ResultRequest $request, ResultService $resultService)
    {
        /** @var User $user */
        $user = auth()->user();

        $resultService->store(
            $request->all(),
            $user,
        );
    }
}
