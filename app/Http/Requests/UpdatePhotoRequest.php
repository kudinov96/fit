<?php

namespace App\Http\Requests;

use App\Enums\ResultTypeEnum;
use App\Models\Stream;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePhotoRequest extends FormRequest
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
            "number" => ["required", "numeric"],
            "photo" => [Rule::requiredIf(fn () => $this->type === ResultTypeEnum::START->value || $this->type === ResultTypeEnum::WEEK_6->value), "image"],
        ];
    }
}
