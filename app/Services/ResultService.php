<?php

namespace App\Services;

use App\Models\Result;
use App\Models\Stream;
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
        $result->stream_id = $currentUser->stream_id;
        $result->type = $data["type"];
        $result->weight = $data["weight"];
        $result->breast = $data["breast"];
        $result->waistline = $data["waistline"];
        $result->hips = $data["hips"];
        $result->hand = $data["hand"];
        $result->leg = $data["leg"];

        if (isset($data["photo_1"])) {
            $result->photo_1 = $data["photo_1"]->store("public/results");
        }

        if (isset($data["photo_2"])) {
            $result->photo_2 = $data["photo_2"]->store("public/results");
        }

        if (isset($data["photo_3"])) {
            $result->photo_3 = $data["photo_3"]->store("public/results");
        }

        if (isset($data["message_user"])) {
            $result->message_user = $data["message_user"];
            $result->message_user_date = now();
        }

        $result->save();

        return $result;
    }

    /**
     * Ответ администратора на результат
     */
    public function answerAdmin(Result $result, string $message): Result
    {
        $result->message_admin = $message;
        $result->message_admin_date = now();

        $result->save();

        return $result;
    }
}
