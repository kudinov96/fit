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
            "photo_1" => ["nullable", "image"],
            "photo_2" => ["nullable", "image"],
            "photo_3" => ["nullable", "image"],
        ];
    }

    public function currentStream(): ?Stream
    {
        return $this->input("currentStream");
    }
}
