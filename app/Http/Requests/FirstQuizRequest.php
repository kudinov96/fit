<?php

namespace App\Http\Requests;

use App\Models\Stream;
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
            "age"                     => ["required", "numeric"],
            "height"                  => ["required"],
            "weight"                  => ["required"],
            "target"                  => ["required", "string"],
            "menu"                    => ["required", "string"],
            "nutritional_supplements" => ["required", "string"],
            "health_problems"         => ["required", "string"],
            "experience"              => ["required", "string"],
        ];
    }

    public function currentStream(): ?Stream
    {
        return $this->input("currentStream");
    }
}
