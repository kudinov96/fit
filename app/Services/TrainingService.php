<?php

namespace App\Services;

use App\Models\Training;

class TrainingService
{
    /**
     * Создать/обновить тренировку
     */
    public function store(array $data, ?Training $training = null): Training
    {
        $positionMax = Training::query()->max("position") + 1 ?? 1;

        $training = $training ?? new Training();
        $training->title_ru = $data["title_ru"];
        $training->title_lv = $data["title_lv"];
        $training->title_en = $data["title_en"];
        $training->description_ru = $data["description_ru"];
        $training->description_lv = $data["description_lv"];
        $training->description_en = $data["description_en"];
        $training->content_ru = $data["content_ru"];
        $training->content_lv = $data["content_lv"];
        $training->content_en = $data["content_en"];
        $training->yt_video_id = $data["yt_video_id"];
        $training->week = $data["week"];
        $training->day = $data["day"];
        $training->where = $data["where"];
        $training->position = $data["position"] ?? $positionMax;

        $training->save();

        return $training;
    }
}
