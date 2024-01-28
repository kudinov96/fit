<?php

namespace App\Http\Requests;

use App\Models\CheckIn;
use Illuminate\Foundation\Http\FormRequest;

class CheckInRequest extends FormRequest
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
            "check_in_id" => ["nullable", 'exists:' . CheckIn::class . ',id'],
            "week"        => ["required", "numeric"],
            "day"         => ["required", "numeric"],
            "training"    => ["required", "boolean"],
            "water"       => ["required", "numeric"],
            "sleep"       => ["required", "numeric"],
            "nutrition"   => ["required", "string"],
            "alcohol"     => ["required", "boolean"],
        ];
    }
}
