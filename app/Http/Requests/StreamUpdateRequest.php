<?php

namespace App\Http\Requests;

use App\Models\Stream;
use Illuminate\Foundation\Http\FormRequest;

class StreamUpdateRequest extends FormRequest
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
            "stream_id" => ['required', "exists:" . Stream::class . ",id"],
            "start_date" => ["required", "date"],
            "template_for_start" => ["nullable", "file"],
            "template_for_finish" => ["nullable", "file"],
        ];
    }
}
