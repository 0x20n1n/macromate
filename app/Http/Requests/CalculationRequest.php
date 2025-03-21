<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CalculationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow all users to make this request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'age' => ['required', 'integer', 'min:1', 'max:120'],
            'weight' => ['required', 'numeric', 'min:1', 'max:500'],
            'height' => ['required', 'numeric', 'min:1', 'max:300'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'activity_id' => ['required', 'exists:activities,id'],
            'body_fat' => ['nullable', 'numeric', 'min:1', 'max:100'],
            'formula' => ['required', Rule::in(['mifflin_st_jeor', 'katch_mcardle'])],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'age.required' => 'Please enter your age.',
            'weight.required' => 'Please enter your weight.',
            'height.required' => 'Please enter your height.',
            'gender.required' => 'Please select your gender.',
            'activity_id.required' => 'Please select your activity level.',
            'formula.required' => 'Please select a calculation formula.',
            'body_fat.min' => 'Body fat percentage must be at least 1%.',
            'body_fat.max' => 'Body fat percentage must be at most 100%.',
        ];
    }
}
