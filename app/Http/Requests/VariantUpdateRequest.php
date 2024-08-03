<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VariantUpdateRequest extends FormRequest
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
            "name"              => ['nullable', 'sometimes', 'string', 'max:255'],
            "additional_price"  => ['nullable', 'sometimes', 'numeric', 'min:1'],
            "extra_description" => ['nullable', 'sometimes', 'string', 'min:1'],
            "publish_date"      => ['nullable', 'sometimes', 'date', 'min:1'],
            'variant_name'      => ['required', 'min:1', 'max:255', 'string'],
            'slug'              => ['required', 'min:1', 'max:255', 'unique:products,slug,'. $this->variant],
        ];
    }
}
