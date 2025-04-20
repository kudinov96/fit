<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FirstQuiz;
use App\Models\MealPlan;
use App\Services\MealPlanService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MealPlanController extends Controller
{
    public function index(): Response
    {
        $items = MealPlan::query()->latest()->get();

        return response()->view("mealPlan.index", [
            "items" => $items,
        ]);
    }

    public function create(): Response
    {
        return response()->view("mealPlan.create");
    }

    public function edit(MealPlan $item): Response
    {
        return response()->view("mealPlan.edit", [
            "item" => $item,
        ]);
    }

    public function configurator(): Response
    {
        return response()->view("mealPlan.configurator");
    }

    public function configuratorSend(Request $request, MealPlanService $mealPlanService): RedirectResponse
    {
        $request->validate([
            "target_type" => "required",
            "menu_type"   => "required",
            "height"      => "required",
            "weight"      => "required",
        ]);

        $quiz = new FirstQuiz();
        $quiz->target = $request->input("target_type");
        $quiz->menu = $request->input("menu_type");
        $quiz->height = $request->input("height");
        $quiz->weight = $request->input("weight");

        $mealPlan = $mealPlanService->determinePlan($quiz);

        return response()
            ->redirectToRoute("mealPlan.configurator")
            ->with("target", $request->input("target_type"))
            ->with("menu", $request->input("menu_type"))
            ->with("height", $request->input("height"))
            ->with("weight", $request->input("weight"))
            ->with("mealPlan", $mealPlan);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "title_ru" => "required",
            "title_en" => "required",
            "title_lv" => "required",
            "target_type" => "required",
            "menu_type" => "required",
            "height_from" => "required",
            "height_to" => "required",
            "weight_from" => "required",
            "weight_to" => "required",
            "file_ru" => ["nullable", "file"],
            "file_en" => ["nullable", "file"],
            "file_lv" => ["nullable", "file"],
        ]);

        $item = new MealPlan();
        $item->title_ru = $request->title_ru;
        $item->title_en = $request->title_en;
        $item->title_lv = $request->title_lv;
        $item->target_type = $request->target_type;
        $item->menu_type = $request->menu_type;
        $item->height_from = $request->height_from;
        $item->height_to = $request->height_to;
        $item->weight_from = $request->weight_from;
        $item->weight_to = $request->weight_to;

        if ($request->file_ru) {
            $item->file_ru = $request->file_ru->store("public/mealPlans");
        }

        if ($request->file_en) {
            $item->file_en = $request->file_en->store("public/mealPlans");
        }

        if ($request->file_lv) {
            $item->file_lv = $request->file_lv->store("public/mealPlans");
        }

        $item->save();

        return response()->redirectToRoute("mealPlan.index");
    }

    public function update(MealPlan $item, Request $request): RedirectResponse
    {
        $request->validate([
            "title_ru" => "required",
            "title_en" => "required",
            "title_lv" => "required",
            "target_type" => "required",
            "menu_type" => "required",
            "height_from" => "required",
            "height_to" => "required",
            "weight_from" => "required",
            "weight_to" => "required",
            "file_ru" => ["nullable", "file"],
            "file_en" => ["nullable", "file"],
            "file_lv" => ["nullable", "file"],
        ]);

        $item->title_ru = $request->title_ru;
        $item->title_en = $request->title_en;
        $item->title_lv = $request->title_lv;
        $item->target_type = $request->target_type;
        $item->menu_type = $request->menu_type;
        $item->height_from = $request->height_from;
        $item->height_to = $request->height_to;
        $item->weight_from = $request->weight_from;
        $item->weight_to = $request->weight_to;

        if ($request->file_ru) {
            $item->file_ru = $request->file_ru->store("public/mealPlans");
        }

        if ($request->file_en) {
            $item->file_en = $request->file_en->store("public/mealPlans");
        }

        if ($request->file_lv) {
            $item->file_lv = $request->file_lv->store("public/mealPlans");
        }

        $item->save();

        return response()->redirectToRoute("mealPlan.edit", ["item" => $item]);
    }

    public function delete(MealPlan $item): RedirectResponse
    {
        $item->delete();

        return response()->redirectToRoute("mealPlan.index");
    }
}
