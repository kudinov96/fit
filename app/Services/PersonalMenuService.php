<?php

namespace App\Services;

use App\Models\FirstQuiz;
use App\Models\User;

/**
 * Сервис для определения какое меню выдать пользователю
 */
class PersonalMenuService
{
    public function personalMenuSrc(User $user, FirstQuiz $firstQuiz): ?string
    {
        if ($user->is_custom_menu) {
            return $user->menu_file;
        }

        return match ($firstQuiz->targetType) {
            1 => $this->targetWeightLoss($firstQuiz),
            2 => $this->targetWeightSupport($firstQuiz),
            3 => $this->targetWeightGain($firstQuiz),
            default => null,
        };
    }

    private function targetWeightLoss(FirstQuiz $firstQuiz): string
    {
        return match ($firstQuiz->menu) {
            "Классическое меню"   => $this->classicWeightLoss($firstQuiz),
            "Gluten FREE"         => $this->simpleMenuWeightLoss($firstQuiz, "GF"),
            "Lactose FREE"        => $this->simpleMenuWeightLoss($firstQuiz, "LF"),
            "Вегетарианское меню" => $this->simpleMenuWeightLoss($firstQuiz, "Vegetarian"),
            "Vegan"               => $this->simpleMenuWeightLoss($firstQuiz, "Vegan"),
            default               => "",
        };
    }

    private function targetWeightSupport(FirstQuiz $firstQuiz): string
    {
        return match ($firstQuiz->menu) {
            "Классическое меню"   => $this->classicWeightSupport($firstQuiz),
            "Gluten FREE"         => $this->simpleMenuWeightSupport("GF"),
            "Lactose FREE"        => $this->simpleMenuWeightSupport("LF"),
            "Вегетарианское меню" => $this->simpleMenuWeightSupport("Vegetarian"),
            "Vegan"               => $this->simpleMenuWeightSupport("Vegan"),
            default => "",
        };
    }

    private function targetWeightGain(FirstQuiz $firstQuiz): string
    {
        return match ($firstQuiz->menu) {
            "Классическое меню" => $this->classicWeightGain($firstQuiz),
            "Gluten FREE", "Lactose FREE", "Вегетарианское меню", "Vegan" => "{$firstQuiz->menu}_1700",
            default => "",
        };
    }

    private function classicWeightLoss(FirstQuiz $firstQuiz): string
    {
        $height = $firstQuiz->height;
        $weight = $firstQuiz->weight;

        if ($height <= 154) {
            return "1300_95_45_130";
        }

        if ($height >= 155 && $height <= 164) {
            return "1400_105_45_140";
        }

        if ($height >= 165 && $height <= 170) {
            if ($weight <= 65) return "1400_105_45_140";
            if ($weight <= 74) return "1500_110_50_150";
            if ($weight <= 78) return "1500_125_50_150";
            if ($weight <= 83) return "1600_120_50_180";
            return "1600_140_55_140";
        }

        if ($height >= 171 && $height <= 174) {
            if ($weight <= 80) return "1500_125_50_150";
            return "1600_120_50_180";
        }

        if ($height >= 175 && $height <= 180) {
            if ($weight <= 72) return "1500_125_50_150";
            if ($weight <= 79) return "1600_110_60_160";
            if ($weight <= 85) return "1600_120_50_180";
            return "1600_140_55_140";
        }

        if ($height >= 181) {
            if ($weight <= 80) return "1600_140_55_140";
            return "1800_130_60_170";
        }

        return "";
    }

    private function classicWeightSupport(FirstQuiz $firstQuiz): string
    {
        $height = $firstQuiz->height;

        if ($height <= 154) {
            return "1500_110_50_150";
        }

        if ($height >= 155 && $height <= 164) {
            return "1600_120_50_180";
        }

        if ($height >= 165 && $height <= 174) {
            return "1800_130_60_170";
        }

        if ($height >= 175 && $height <= 180) {
            return "1800_140_65_180";
        }

        if ($height >= 181) {
            return "2000_130_65_240";
        }

        return "";
    }

    private function classicWeightGain(FirstQuiz $firstQuiz): string
    {
        $height = $firstQuiz->height;

        if ($height <= 154) {
            return "1600_110_60_160";
        }

        if ($height >= 155 && $height <= 165) {
            return "1800_130_60_170";
        }

        if ($height >= 166 && $height <= 170) {
            return "2000_130_65_240";
        }

        if ($height >= 171) {
            return "2200_145_70_260";
        }

        return "";
    }

    private function simpleMenuWeightLoss(FirstQuiz $firstQuiz, string $menuPrefix): string
    {
        $height = $firstQuiz->height;

        if ($height <= 165) {
            return "{$menuPrefix}_1300";
        }

        if ($height >= 166 && $height <= 175) {
            return "{$menuPrefix}_1500";
        }

        if ($height >= 176) {
            return "{$menuPrefix}_1700";
        }

        return "";
    }

    private function simpleMenuWeightSupport(string $menuPrefix): string
    {
        return "{$menuPrefix}_1700";
    }
}
