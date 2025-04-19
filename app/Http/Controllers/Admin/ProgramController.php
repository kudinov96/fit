<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Services\TrainingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProgramController extends Controller
{
    public function index(): Response
    {
        $programs = Program::query()->latest()->get();

        return response()->view("program.index", [
            "programs" => $programs,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
        ]);

        Program::query()->create([
            "name" => $request->input("name"),
        ]);

        return response()->redirectToRoute("program.index");
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
        ]);

        /** @var Program $stream */
        $program = Program::query()->find($request->program_id);

        if ($program) {
            $program->update(["name" => $request->input("name")]);
        }

        return response()->redirectToRoute("program.index");
    }

    public function view(Program $item)
    {
        return response()->view("program.edit", [
            "program" => $item,
        ]);
    }

    public function duplicate(Program $item, TrainingService $trainingService): RedirectResponse
    {
        $newProgram = Program::query()->create([
            "name" => $item->name,
        ]);

        foreach ($item->trainings as $training) {
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
                "program_id"     => $newProgram->id,
            ]);
        }

        return response()->redirectToRoute("program.index");
    }

    public function delete(Program $item): RedirectResponse
    {
        $item->trainings()->delete();
        $item->delete();

        return response()->redirectToRoute("program.index");
    }
}
