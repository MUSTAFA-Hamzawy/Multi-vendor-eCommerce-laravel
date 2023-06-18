<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // get the coupon id ( for updating only )
        $currentCouponId = 0;
        if ($this->has('coupon_id')){
            $currentCouponId = $this->get('coupon_id');
        }

        return [
            'coupon_code' => ['required', 'string', 'max:250', Rule::unique('coupon')->ignore
            ($currentCouponId, 'coupon_id')],
            'discount_amount' => ['required', 'numeric', 'gt:0', 'lt:100'],
            'expiration_date' => ['required', 'date', 'after:today']
        ];
    }
}
