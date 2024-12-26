<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutMeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'biography' => ['required', 'string', 'min:30', 'max:5000'],
            'hobby' => ['sometimes', 'required', 'string', 'min:2', 'max:50'],
            'phobia' => ['sometimes', 'required', 'string', 'min:2', 'max:50']
        ];
    }

    public function messages(): array
    {
        return [
            'biography.required' => 'Özgeçmiş alanı zorunludur.',
            'biography.min' => 'Özgeçmiş en az 30 karakter olmalıdır.',
            'biography.max' => 'Özgeçmiş en fazla 5000 karakter olabilir.',
            'hobby.required' => 'Hobi alanı zorunludur.',
            'hobby.min' => 'Hobi en az 2 karakter olmalıdır.',
            'phobia.required' => 'Fobi alanı zorunludur.',
            'phobia.min' => 'Fobi en az 2 karakter olmalıdır.'
        ];
    }
}
