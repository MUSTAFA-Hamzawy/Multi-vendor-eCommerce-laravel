<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $currentCategoryId = 0;
        if ($this->has('category_id')){
            $currentCategoryId = $this->get('category_id');
        }

        return [
            'category_name' => ['required', 'string', 'max:150', Rule::unique('category')->ignore
            ($currentCategoryId, 'category_id')],
            'category_image' => [$currentCategoryId ? 'nullable' :'required', 'image', 'mimes:' .
                self::ALLOWED_EXTENSION]
        ];
    }


}
