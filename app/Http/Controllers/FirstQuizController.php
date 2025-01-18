<?php

namespace App\Http\Controllers;

use App\Http\Requests\FirstQuizRequest;
use App\Models\User;
use App\Services\FirstQuizService;
use App\Services\PersonalMenuService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class FirstQuizController extends Controller
{
    public function index(): Response
    {
        return response()->view("first-quiz");
    }

    public function success(): Response
    {
        return response()->view("first-quiz-success");
    }

    public function store(FirstQuizRequest $request, FirstQuizService $firstQuizService, PersonalMenuService $personalMenuService): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();
        $language = $request->input("language");

        unset($request["experience_options"]);

        if ($language) {
            $user->update([
                "language" => $language,
            ]);
        }

        $firstQuiz = $firstQuizService->store(
            $request->all(),
            $user,
        );

        // @todo тестирование нового меню
        /*dump($personalMenuService->personalMenuSrc($user, $firstQuiz));
        $firstQuiz->delete();
        dd();*/

        $user->update([
            "menu_file" => $personalMenuService->personalMenuSrc($user, $firstQuiz),
        ]);

        return response()->redirectToRoute("first_quiz.success");
    }
}
