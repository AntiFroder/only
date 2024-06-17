<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFreeCarsRequest extends FormRequest
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
            'model_name' => 'bail|nullable|string|max:255',
            'category_id' => 'bail|nullable|exists:car_categories,id',
            'date' => 'bail|required|date',
        ];
    }
}
