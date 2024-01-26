<?php

namespace App\Http\Requests;

use App\Enums\TrainingWhereEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TrainingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "title_ru" => ["required", "string"],
            "title_lv" => ["required", "string"],
            "title_en" => ["required", "string"],
            "description_ru" => ["required", "string"],
            "description_lv" => ["required", "string"],
            "description_en" => ["required", "string"],
            "content_ru" => ["required", "string"],
            "content_lv" => ["required", "string"],
            "content_en" => ["required", "string"],
            "yt_video_id" => ["required", "string"],
            "week" => ["required", "numeric", "min:1", "max:6"],
            "day" => ["required", "numeric", "min:1", "max:5"],
            "where" => ["required", Rule::enum(TrainingWhereEnum::class)],
            "position" => ["nullable", "numeric"],
        ];
    }
}
