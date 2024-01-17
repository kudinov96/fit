<?php

namespace App\Services;

use App\Models\Result;
use App\Models\User;

/**
 * Сервис обработки результатов пользователей
 */
class ResultService
{
    public function store(array $data, User $currentUser): Result
    {
        $result = new Result();
        $result->user_id = $currentUser->id;
        $result->type = $data["type"];
        $result->weight = $data["weight"];
        $result->breast = $data["breast"];
        $result->waistline = $data["waistline"];
        $result->hips = $data["hips"];
        $result->hand = $data["hand"];
        $result->leg = $data["leg"];
        // Положить в storage
        //$result->photo_1 = $data["photo_1"] ?? null;
        //$result->photo_2 = $data["photo_2"] ?? null;
        //$result->photo_3 = $data["photo_3"] ?? null;

        $result->save();

        return $result;
    }
}
