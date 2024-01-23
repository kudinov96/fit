<?php

namespace App\Services;

use App\Models\FirstQuiz;
use App\Models\Stream;
use App\Models\User;

/**
 * Сервис начального опросника
 */
class FirstQuizService
{
    /**
     * Сохранить начальный квиз
     */
    public function store(array $data, User $currentUser): FirstQuiz
    {
        $firstQuiz = new FirstQuiz();
        $firstQuiz->user_id = $currentUser->id;
        $firstQuiz->stream_id = $currentUser->stream_id;
        $firstQuiz->age = $data["age"];
        $firstQuiz->height = $data["height"];
        $firstQuiz->weight = $data["weight"];
        $firstQuiz->target = $data["target"];
        $firstQuiz->menu = $data["menu"];
        $firstQuiz->nutritional_supplements = $data["nutritional_supplements"];
        $firstQuiz->health_problems = $data["health_problems"];
        $firstQuiz->experience = $data["experience"];

        $firstQuiz->save();

        return $firstQuiz;
    }
}
