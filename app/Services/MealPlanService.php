<?php

namespace App\Services;

use App\Models\MealPlan;
use App\Models\FirstQuiz;

class MealPlanService
{
    public function determinePlan(FirstQuiz $quiz): ?MealPlan
    {
        return MealPlan::query()
            ->where('target_type', $quiz->targetType)
            ->where('menu_type', $this->mapMenuType($quiz->menu))
            ->where('height_from', '<=', $quiz->height)
            ->where(function ($q) use ($quiz) {
                $q->whereNull('height_to')
                    ->orWhere('height_to', '>=', $quiz->height);
            })
            ->where(function ($q) use ($quiz) {
                $q->whereNull('weight_from')->orWhere('weight_from', '<=', $quiz->weight);
            })
            ->where(function ($q) use ($quiz) {
                $q->whereNull('weight_to')->orWhere('weight_to', '>=', $quiz->weight);
            })
            ->first();
    }

    private function mapMenuType(string $menu): string
    {
        return match ($menu) {
            'Классическое меню'   => 'classic',
            'Gluten FREE'         => 'GF',
            'Lactose FREE'        => 'LF',
            'Вегетарианское меню' => 'vegetarian',
            'Vegan'               => 'vegan',
            default               => '',
        };
    }
}

