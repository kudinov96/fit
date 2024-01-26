<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TrainingWhereEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingRequest;
use App\Models\Training;
use App\Services\TrainingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class TrainingController extends Controller
{
    public function index(): Response
    {
        return response()->view("training.index");
    }

    public function create(int $week): Response
    {
        if ($week > 6 || $week < 1) {
            abort(404);
        }

        return response()->view("training.create", [
            "trainingWhere" => TrainingWhereEnum::cases(),
            "week" => $week,
        ]);
    }

    public function edit(Training $training): Response
    {
        return response()->view("training.edit", [
            "trainingWhere" => TrainingWhereEnum::cases(),
            "training" => $training,
        ]);
    }

    public function indexWeek(int $week): Response
    {
        if ($week > 6 || $week < 1) {
            abort(404);
        }

        $trainings = Training::query()
            ->where("week", $week)
            ->get();

        return response()->view("training.index-week", [
            "week" => $week,
            "trainings" => $trainings,
        ]);
    }

    public function store(TrainingRequest $request, TrainingService $trainingService): RedirectResponse
    {
        $trainingService->store($request->all());

        return response()->redirectToRoute("training.index.week", [
            "week" => $request->input("week"),
        ]);
    }

    public function update(Training $training, TrainingRequest $request, TrainingService $trainingService): RedirectResponse
    {
        $trainingService->store($request->all(), $training);

        return response()->redirectToRoute("training.index.week", [
            "week" => $request->input("week"),
        ]);
    }

    public function delete(Training $training): RedirectResponse
    {
        $training->delete();

        return response()->redirectToRoute("training.index");
    }
}
