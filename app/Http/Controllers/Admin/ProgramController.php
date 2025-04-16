<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
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
}
