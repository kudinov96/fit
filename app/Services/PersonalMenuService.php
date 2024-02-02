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
        if ($firstQuiz->menu === "Классическое меню") {
            if ($firstQuiz->height <= 154) {
                return "1300_95_45_130";
            }

            if ($firstQuiz->height >= 155 && $firstQuiz->height <= 164) {
                return "1400_105_45_140";
            }

            if ($firstQuiz->height >= 165 && $firstQuiz->height <= 170) {
                if ($firstQuiz->weight <= 65) {
                    return "1400_105_45_140";
                }

                if ($firstQuiz->weight >= 66 && $firstQuiz->weight <= 74) {
                    return "1500_110_50_150";
                }

                if ($firstQuiz->weight >= 75 && $firstQuiz->weight <= 78) {
                    return "1500_125_50_130";
                }

                if ($firstQuiz->weight >= 79 && $firstQuiz->weight <= 83) {
                    return "1600_120_50_180";
                }

                if ($firstQuiz->weight >= 84) {
                    return "1600_140_55_140";
                }
            }

            if ($firstQuiz->height >= 171 && $firstQuiz->height <= 174) {
                if ($firstQuiz->weight <= 80) {
                    return "1500_125_50_130";
                }

                if ($firstQuiz->weight >= 81) {
                    return "1600_120_50_180";
                }
            }

            if ($firstQuiz->height >= 175 && $firstQuiz->height <= 180) {
                if ($firstQuiz->weight <= 72) {
                    return "1500_125_50_130";
                }

                if ($firstQuiz->weight >= 73 && $firstQuiz->weight <= 79) {
                    return "1600_110_60_160";
                }

                if ($firstQuiz->weight >= 80 && $firstQuiz->weight <= 85) {
                    return "1600_120_50_180";
                }

                if ($firstQuiz->weight >= 86) {
                    return "1600_140_55_140";
                }
            }

            if ($firstQuiz->height >= 181) {
                if ($firstQuiz->weight <= 80) {
                    return "1600_140_55_140";
                }

                if ($firstQuiz->weight >= 81) {
                    return "1800_130_60_170";
                }
            }
        } elseif ($firstQuiz->menu === "Gluten FREE") {
            if ($firstQuiz->height <= 175) {
                return "GLUTEN_FREE_1500_100_50_140";
            }

            if ($firstQuiz->height >= 176) {
                return "GLUTEN_FREE_1700_100_60_160";
            }
        } elseif ($firstQuiz->menu === "Lactose FREE") {
            if ($firstQuiz->height <= 175) {
                return "LACTOSE_FREE_1500_80_50_140";
            }

            if ($firstQuiz->height >= 176) {
                return "LACTOSE_FREE_1700_100_60_180";
            }
        } elseif ($firstQuiz->menu === "Вегетарианское меню") {
            if ($firstQuiz->height <= 175) {
                return "VEGETARIA_1500_80_50_140";
            }

            if ($firstQuiz->height >= 176) {
                return "VEGETARIAN_1700_100_60_160";
            }
        }
    }

    private function targetWeightSupport(FirstQuiz $firstQuiz): string
    {
        if ($firstQuiz->menu === "Классическое меню") {
            if ($firstQuiz->height <= 154) {
                return "1500_110_50_150";
            }

            if ($firstQuiz->height >= 155 && $firstQuiz->height <= 164) {
                return "1600_120_50_180";
            }

            if ($firstQuiz->height >= 165 && $firstQuiz->height <= 174) {
                return "1800_130_60_170";
            }

            if ($firstQuiz->height >= 175 && $firstQuiz->height <= 180) {
                return "1900_130_60_190";
            }

            if ($firstQuiz->height >= 181) {
                return "2000_130_65_240";
            }
        } elseif ($firstQuiz->menu === "Gluten FREE") {
            return "GLUTEN_FREE_1700_100_60_160";
        } elseif ($firstQuiz->menu === "Lactose FREE") {
            return "LACTOSE_FREE_1700_100_60_180";
        } elseif ($firstQuiz->menu === "Вегетарианское меню") {
            return "VEGETARIAN_1700_100_60_160";
        }
    }

    private function targetWeightGain(FirstQuiz $firstQuiz): string
    {
        if ($firstQuiz->menu === "Классическое меню") {
            if ($firstQuiz->height <= 154) {
                return "1600_110_60_160";
            }

            if ($firstQuiz->height >= 155 && $firstQuiz->height <= 165) {
                return "1800_130_60_170";
            }

            if ($firstQuiz->height >= 166 && $firstQuiz->height <= 170) {
                return "2000_130_65_240";
            }

            if ($firstQuiz->height >= 171) {
                return "2200_145_70_260";
            }
        } elseif ($firstQuiz->menu === "Gluten FREE") {
            return "GLUTEN_FREE_1700_100_60_160";
        } elseif ($firstQuiz->menu === "Lactose FREE") {
            return "LACTOSE_FREE_1700_100_60_180";
        } elseif ($firstQuiz->menu === "Вегетарианское меню") {
            return "VEGETARIAN_1700_100_60_160";
        }
    }
}
