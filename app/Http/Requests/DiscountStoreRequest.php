<?php

namespace App\Http\Requests;

use App\Enums\DiscountType;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DiscountStoreRequest extends FormRequest
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
        $discountTypes = implode(',', array_map(fn($case) => $case->value, DiscountType::cases()));
        return [
            'name'       => ['required', 'string'],
            'type'       => ['required', 'string', 'in:'.$discountTypes],
            'value'      => ['required'],
            'start_date' => ['required', 'date'],
            'end_date'   => ['required', 'date'],
        ];
    }
}
