<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Enums\ResultTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerAdminRequest;
use App\Http\Requests\UpdateMenuUserRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Result;
use App\Models\User;
use App\Services\LogService;
use App\Services\ResultService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function view(User $user, ResultService $resultService): Response
    {
        return response()->view("user.view", [
            "user" => $user,
            "weeks" => $resultService->weeksWithResults($user),
            "resultStart" => $user->results->where("type", ResultTypeEnum::START)->first(),
            "resultWeek1" => $user->results->where("type", ResultTypeEnum::WEEK_1)->first(),
            "resultWeek2" => $user->results->where("type", ResultTypeEnum::WEEK_2)->first(),
            "resultWeek3" => $user->results->where("type", ResultTypeEnum::WEEK_3)->first(),
            "resultWeek4" => $user->results->where("type", ResultTypeEnum::WEEK_4)->first(),
            "resultWeek5" => $user->results->where("type", ResultTypeEnum::WEEK_5)->first(),
            "resultWeek6" => $user->results->where("type", ResultTypeEnum::WEEK_6)->first(),
        ]);
    }

    public function store(UserRegisterRequest $request, CreateNewUser $createNewUser, LogService $logService)
    {
        try {
            $createNewUser->create($request->all());
        } catch (\Throwable $e) {
            if (config("app.env") === "local") {
                dd($e);
            }
            $logService->error("User not registered", $e);

            return redirect()->to("/streams/{$request->stream_id}?modal=alreadyModal");
        }

        return redirect()->to("/streams/{$request->stream_id}?modal=thanksModal");
    }

    public function delete(Request $request)
    {
        $user = User::query()->find($request->user_id);
        $user->delete();

        return redirect()->to("/streams/{$request->stream_id}?modal=thanks_deleteModal");
    }

    public function updateMenu(UpdateMenuUserRequest $request, User $user): RedirectResponse
    {
        $menuFile = $request->file("menu_file");

        $user->update([
            "menu_file" => $menuFile->storeAs("public/users/menus", uniqid() . '.' . $menuFile->getClientOriginalExtension()),
            "menu_name" => $request->input("menu_name"),
            "is_custom_menu" => true,
        ]);

        return redirect()->to("/user/$user->id/view?modal=thanksModal");
    }

    public function answerAdmin(AnswerAdminRequest $request, ResultService $resultService): RedirectResponse
    {
        /** @var Result $result */
        $result = Result::query()->find($request->input("result_id"));
        $userId = $request->input("user_id");

        $resultService->answerAdmin(
            $result,
            $request->input("message")
        );

        return redirect()->to("/user/{$userId}/view/?modal=commentModal");
    }
}
