<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountCouponStoreRequest extends FormRequest
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
            'code'        => ['required', 'string', 'unique:discount_coupons,code'],
            'discount_id' => ['required', 'exists:discounts,id'],
            'usage_limit' => ['required', 'integer'],
            'expiry_date' => ['required', 'date']
        ];
    }
}
