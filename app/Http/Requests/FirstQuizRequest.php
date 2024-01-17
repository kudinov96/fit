<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirstQuizRequest extends FormRequest
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
            "language"                => ["required", "string"],
            "age"                     => ["required", "numeric"],
            "height"                  => ["required", "numeric"],
            "weight"                  => ["required", "numeric"],
            "target"                  => ["required", "numeric"],
            "menu"                    => ["required", "numeric"],
            "nutritional_supplements" => ["required", "string"],
            "health_problems"         => ["required", "string"],
            "experience"              => ["required", "string"],
        ];
    }
}
