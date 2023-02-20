<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class VendorInfoRequest extends FormRequest
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

        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
            'username' => ['required', 'string', 'max:100', Rule::unique('users')->ignore(Auth::id())],
            'shop_name' => ['nullable', 'string', 'max:200', 'regex:/^[\pL\s\-]+$/u',
                Rule::unique('vendor_shop')->ignore(Auth::id(), 'user_id')],
            'shop_description' => ['nullable', 'string'],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:200'],
        ];
    }
}
