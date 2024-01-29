<?php

namespace App\Http\Requests;

use App\Enums\ResultTypeEnum;
use App\Models\Stream;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResultRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "type" => ["required", "string", Rule::enum(ResultTypeEnum::class)],
            "weight" => ["required", "numeric"],
            "breast" => ["required", "numeric"],
            "waistline" => ["required", "numeric"],
            "hips" => ["required", "numeric"],
            "hand" => ["required", "numeric"],
            "leg" => ["required", "numeric"],
            "photo_1" => [Rule::requiredIf(fn () => $this->type === ResultTypeEnum::START->value || $this->type === ResultTypeEnum::WEEK_6->value), "image"],
            "photo_2" => [Rule::requiredIf(fn () => $this->type === ResultTypeEnum::START->value || $this->type === ResultTypeEnum::WEEK_6->value), "image"],
            "photo_3" => [Rule::requiredIf(fn () => $this->type === ResultTypeEnum::START->value || $this->type === ResultTypeEnum::WEEK_6->value), "image"],
            "message_user" => ["nullable", "string"],
        ];
    }

    public function currentStream(): ?Stream
    {
        return $this->input("currentStream");
    }
}
