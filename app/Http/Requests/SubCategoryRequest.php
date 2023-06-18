<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubCategoryRequest extends FormRequest
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
        // get the brand id ( for updating only )
        $currentSubCategoryId = 0;
        if ($this->has('sub_category_id')){
            $currentSubCategoryId = $this->get('sub_category_id');
        }

        return [
            'sub_category_name' => ['required', 'string', 'max:150', Rule::unique('sub_category')->ignore
            ($currentSubCategoryId, 'sub_category_id')],
            'sub_category_image' => [$currentSubCategoryId ? 'nullable' :'required', 'image', 'mimes:' .
                self::ALLOWED_EXTENSION],
            'category_id' => ['required', 'int']
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Category is required',
            'category_id.int' => 'Category is required',
        ];
    }
}
