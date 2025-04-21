<?php

namespace App\Console\Commands;

use App\Models\FirstQuiz;
use App\Services\MealPlanService;
use Illuminate\Console\Command;

class SetMealPlanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'x:set-meal-plan-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Установить планы меню';

    /**
     * Execute the console command.
     */
    public function handle(MealPlanService $mealPlanService)
    {
        $firstQuiz = FirstQuiz::query()->get();
        foreach ($firstQuiz as $quiz) {
            $quiz->user->update([
                "menu_id" => $mealPlanService->determinePlan($quiz)->id ?? null,
            ]);
        }
    }
}
