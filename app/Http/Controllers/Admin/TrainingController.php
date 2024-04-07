<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TrainingWhereEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingRequest;
use App\Models\Training;
use App\Services\TrainingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
            ->whereJsonContains("weeks", (string) $week)
            ->orderBy("day")
            ->orderBy("position")
            ->get();

        $trainingsPerDays = [];
        foreach ($trainings as $training) {
            $trainingsPerDays[$training->day][] = $training;
        }

        return response()->view("training.index-week", [
            "week" => $week,
            "trainingsPerDays" => $trainingsPerDays,
        ]);
    }

    public function store(TrainingRequest $request, TrainingService $trainingService): RedirectResponse
    {
        $trainingService->store($request->all());

        return response()->redirectToRoute("training.index.week", [
            "week" => $request->input("weeks")[0],
        ]);
    }

    public function update(Training $training, TrainingRequest $request, TrainingService $trainingService): RedirectResponse
    {
        $trainingService->store($request->all(), $training);

        return response()->redirectToRoute("training.index.week", [
            "week" => $request->input("weeks")[0],
        ]);
    }

    public function delete(Training $training): RedirectResponse
    {
        $training->delete();

        return response()->redirectToRoute("training.index");
    }

    public function duplicate(Training $training, Request $request, TrainingService $trainingService): RedirectResponse
    {
        $trainingService->store([
            "title_ru"       => $training->title_ru,
            "title_en"       => $training->title_en,
            "title_lv"       => $training->title_lv,
            "description_ru" => $training->description_ru,
            "description_en" => $training->description_en,
            "description_lv" => $training->description_lv,
            "content_ru"     => $training->content_ru,
            "content_en"     => $training->content_en,
            "content_lv"     => $training->content_lv,
            "yt_video_id"    => $training->yt_video_id,
            "weeks"          => $training->weeks,
            "day"            => $training->day,
            "where"          => $training->where,
            "position"       => $training->position,
        ]);

        return response()->redirectToRoute("training.index.week", [
            "week" => $request->input("week"),
        ]);
    }
}
