<?php

namespace App\Http\Controllers;

use App\Http\Requests\FirstQuizRequest;
use App\Models\User;
use App\Services\FirstQuizService;
use App\Services\MealPlanService;
use App\Services\PersonalMenuService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class FirstQuizController extends Controller
{
    public function index(): Response
    {
        $user = auth()->user();
        if (!$user->stream->access_to_meal_plan) {
            abort(403);
        }

        return response()->view("first-quiz");
    }

    public function success(): Response
    {
        $user = auth()->user();
        if (!$user->stream->access_to_meal_plan) {
            abort(403);
        }

        return response()->view("first-quiz-success");
    }

    public function store(FirstQuizRequest $request, FirstQuizService $firstQuizService, MealPlanService $mealPlanService): RedirectResponse
    {
        $user = auth()->user();
        if (!$user->stream->access_to_meal_plan) {
            abort(403);
        }

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

        $menuPlan = $mealPlanService->determinePlan($firstQuiz);

        if (!$menuPlan) {
            $user->update([
                "menu_id" => $menuPlan->id,
            ]);
        }

        return response()->redirectToRoute("first_quiz.success");
    }
}
