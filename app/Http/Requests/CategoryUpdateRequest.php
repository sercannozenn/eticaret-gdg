<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryUpdateRequest extends FormRequest
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
            'name'              => ['required', 'min:2', 'max:255'],
            'short_description' => ['sometimes', 'nullable', 'max:255'],
            'description'       => ['sometimes', 'nullable', 'max:255'],
            'slug'              => ['sometimes', 'nullable', 'max:255', 'unique:categories,slug,' . $this->category->id],
        ];
    }

    public function prepareForValidation()
    {
        if (!is_null($this->slug))
        {
            $this->merge(['slug' => Str::slug($this->slug)]);
        }
    }
}
