<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Requests\UserRegisterRequest;
use App\Services\LogService;

class UserController extends Controller
{
    public function endpoint(UserRegisterRequest $request, CreateNewUser $createNewUser, LogService $logService)
    {
        $token = config("auth.register_endpoint_token");

        if (!$token || $token !== $request->input("token")) {
            return;
        }

        try {
            $createNewUser->create($request->all());
        } catch (\Throwable $e) {
            $logService->error("User not registered", $e);
            return;
        }

        return response()->json(["success" => true]);
    }
}
