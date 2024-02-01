<?php

namespace App\Http\Requests;

use App\Models\Result;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class AnswerAdminRequest extends FormRequest
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
            "user_id" => ["required", "exists:" . User::class . ",id"],
            "result_id" => ["required", "exists:" . Result::class . ",id"],
            "message" => ["required", "string"]
        ];
    }
}
