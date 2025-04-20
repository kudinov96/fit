<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StreamRequest extends FormRequest
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
            "title" => ["nullable"],
            "start_date" => ["required", "date"],
            "template_for_start" => ["nullable", "file"],
            "template_for_finish" => ["nullable", "file"],
            "template_info_book_lv" => ["nullable", "file"],
            "template_info_book_en" => ["nullable", "file"],
            "template_info_book_ru" => ["nullable", "file"],
            "template_recipe_book_lv" => ["nullable", "file"],
            "template_recipe_book_en" => ["nullable", "file"],
            "template_recipe_book_ru" => ["nullable", "file"],
            "group_chat" => ["nullable", "url"],
            "program_id" => ["required", "exists:programs,id"],
            "access_to_gym" => ["required", "boolean"],
            "access_to_home" => ["required", "boolean"],
            "access_to_meal_plan" => ["required", "boolean"],
            "access_to_results" => ["required", "boolean"],
            "access_to_check_in" => ["required", "boolean"],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'access_to_gym' => (bool) $this->boolean('access_to_gym'),
            'access_to_home' => (bool) $this->boolean('access_to_home'),
            'access_to_meal_plan' => (bool) $this->boolean('access_to_meal_plan'),
            'access_to_results' => (bool) $this->boolean('access_to_results'),
            'access_to_check_in' => (bool) $this->boolean('access_to_check_in'),
            'from_view' => (bool) $this->boolean('from_view'),
        ]);
    }
}
