<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    private const ALLOWED_EXTENSION = 'jpg,jpeg,png,webp,gif';

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
        $editCase = $this->get('product_id');
        return [
            'product_name' => ['required', 'string', 'max:250'],
            'product_code' => [$editCase ? 'nullable' : 'required', 'string', 'max:250', 'unique:product'],
            'product_tags' => ['required', 'string'],
            'product_colors' => ['required', 'string'],
            'product_short_description' => ['required', 'string'],
            'product_long_description' => ['nullable', 'string'],
            'product_quantity' => ['required', 'int'],
            'product_thumbnail' => [$editCase ? 'nullable' : 'required', 'image', 'mimes:' . self::ALLOWED_EXTENSION,
        'max:4096'],
            'product_images' => [$editCase ? 'nullable' : 'required', 'array'],
            'product_images.*' => ['image', 'mimes:' . self::ALLOWED_EXTENSION, 'max:4096'],
            'product_price' => ['required', 'numeric'],
            'brand_id' => ['required', 'int'],     // brand id
            'sub_category_id' => ['required', 'int'],     // category id

        ];
    }
}
