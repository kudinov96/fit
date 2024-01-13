<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Services\LogService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function endpoint(Request $request, CreateNewUser $createNewUser, LogService $logService)
    {
        $token = config("register_endpoint_token");

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
