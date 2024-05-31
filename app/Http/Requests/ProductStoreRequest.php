<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductStoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"                        => ['required', 'string', 'min:2', 'max:255'],
            "price"                       => ['required', 'numeric', 'min:1'],
            "type_id"                     => ['required', 'exists:product_types,id'],
            "brand_id"                    => ['required', 'exists:brands,id'],
            "category_id"                 => ['required', 'exists:categories,id'],
            "short_description"           => ['nullable', 'sometimes', 'string', 'max:255'],
            "description"                 => ['nullable', 'sometimes', 'string'],
            "variant"                     => ['required', 'array', 'min:1'],
            "variant.*.name"              => ['nullable', 'sometimes', 'string', 'max:255'],
            "variant.*.variant_name"      => ['required', 'string', 'min:1', 'max:255'],
            "variant.*.slug"              => ['required', 'string', 'min:1', 'max:255', 'unique:products,slug'],
            "variant.*.additional_price"  => ['nullable', 'sometimes', 'numeric', 'min:1'],
            "variant.*.extra_description" => ['nullable', 'sometimes', 'string', 'min:1'],
            "variant.*.publish_date"      => ['nullable', 'sometimes', 'date', 'min:1'],
            "variant.*.featured_image"    => ['required', 'string', 'min:1'],
            "variant.*.image"             => ['required', 'string', 'min:1'],
            "variant.*.size"              => ['required', 'array', 'min:1'],
            "variant.*.size.*"            => ['required', 'string', 'min:1'],
            "variant.*.stock"             => ['required', 'array', 'min:1'],
            "variant.*.stock.*"           => ['required', 'integer', 'min:1'],

        ];
    }

    public function prepareForValidation()
    {
        $variants = $this->input('variant', []);

        foreach ($variants as $key => &$variant) {
            $variant['slug'] = Str::slug($variant['slug']);
        }

        $this->merge(['variant' => $variants]);
    }
}
