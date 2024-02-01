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
        if ($firstQuiz->height <= 154) {
            return "weight-loss/menu1";
        }

        if ($firstQuiz->height >= 155 && $firstQuiz->height <= 164) {
            return "weight-loss/menu2";
        }

        // etc
    }

    private function targetWeightSupport(FirstQuiz $firstQuiz): string
    {
        if ($firstQuiz->height <= 154) {
            return "weight-support/menu1";
        }

        if ($firstQuiz->height >= 155 && $firstQuiz->height <= 164) {
            return "weight-support/menu2";
        }

        // etc
    }

    private function targetWeightGain(FirstQuiz $firstQuiz): string
    {
        if ($firstQuiz->height <= 154) {
            return "weight-gain/menu1";
        }

        if ($firstQuiz->height >= 155 && $firstQuiz->height <= 165) {
            return "weight-gain/menu2";
        }

        // etc
    }
}
