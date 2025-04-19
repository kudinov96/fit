<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TrainingWhereEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingRequest;
use App\Models\Program;
use App\Models\Training;
use App\Services\TrainingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TrainingController extends Controller
{
    public function create(Program $item, int $week): Response
    {
        if ($week > 6 || $week < 1) {
            abort(404);
        }

        return response()->view("training.create", [
            "trainingWhere" => TrainingWhereEnum::cases(),
            "week" => $week,
        ]);
    }

    public function edit(Program $item, Training $training): Response
    {
        return response()->view("training.edit", [
            "trainingWhere" => TrainingWhereEnum::cases(),
            "training" => $training,
        ]);
    }

    public function indexWeek(Program $item, int $week): Response
    {
        if ($week > 6 || $week < 1) {
            abort(404);
        }

        $trainings = $item->trainings()
            ->whereJsonContains("weeks", (string) $week)
            ->orderBy("day")
            ->orderBy("position")
            ->get();

        $trainingsPerDays = [];
        foreach ($trainings as $training) {
            $trainingsPerDays[$training->day][] = $training;
        }

        return response()->view("training.index-week", [
            "program" => $item,
            "week" => $week,
            "trainingsPerDays" => $trainingsPerDays,
        ]);
    }

    public function store(TrainingRequest $request, TrainingService $trainingService): RedirectResponse
    {
        $trainingService->store($request->all());

        return response()->redirectToRoute("training.index.week", [
            "item" => $request->input("program_id"),
            "week" => $request->input("weeks")[0],
        ]);
    }

    public function update(Training $training, TrainingRequest $request, TrainingService $trainingService): RedirectResponse
    {
        $trainingService->store($request->all(), $training);

        return response()->redirectToRoute("training.index.week", [
            "item" => $training->program_id,
            "week" => $request->input("weeks")[0],
        ]);
    }

    public function delete(Training $training): RedirectResponse
    {
        $training->delete();

        return response()->redirectToRoute("program.view", ["item" => $training->program_id]);
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
            "program_id"     => $training->program_id,
        ]);

        return response()->redirectToRoute("training.index.week", [
            "item" => $training->program_id,
            "week" => $request->input("week"),
        ]);
    }
}
