<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'regex:/^[0-9\-\(\)\/\+\s]*$/', 'min:10', 'max:20'],
            'message' => ['required', 'string', 'min:10', 'max:1000']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Ad Soyad alanı zorunludur.',
            'name.min' => 'Ad Soyad en az 2 karakter olmalıdır.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'phone.regex' => 'Geçerli bir telefon numarası giriniz.',
            'phone.min' => 'Telefon numarası en az 10 karakter olmalıdır.',
            'message.required' => 'Mesaj alanı zorunludur.',
            'message.min' => 'Mesaj en az 10 karakter olmalıdır.',
            'message.max' => 'Mesaj en fazla 1000 karakter olabilir.'
        ];
    }
}
