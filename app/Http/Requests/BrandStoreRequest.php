<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class BrandStoreRequest extends FormRequest
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
            'name' => ['required'],
            'slug' => ['sometimes', 'nullable', 'max:255', 'unique:brands,slug'],
            'logo' => ['sometimes', 'nullable', 'mimes:jpeg,jpg,webp,png', 'max:2048'],
            'order' => ['sometimes', 'nullable', 'integer']
        ];
    }

    public function prepareForValidation()
    {
        if (!is_null($this->slug)) {
            $this->merge(['slug' => Str::slug($this->slug)]);
        }
    }
}
