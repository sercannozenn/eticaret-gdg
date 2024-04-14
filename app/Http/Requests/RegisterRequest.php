<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'min:2', 'max:125'],
            'email' => ["required", 'email', 'unique:users', 'max:125'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->symbols()->numbers()]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ad Soyad alanı zorunludur',
            'name.min' => 'Ad Soyad alanı en az iki karakterden oluşmalıdır',
            'name.max' => 'Ad Soyad alanı en fazla 125 karakterden oluşabilir.'
        ];
    }
}
