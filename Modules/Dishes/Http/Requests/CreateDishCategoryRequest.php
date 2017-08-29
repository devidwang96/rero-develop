<?php

namespace Modules\Dishes\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateDishCategoryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        return [
            'title' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [
            'title.required' => trans('dishes::dishcategories.messages.title is required'),
        ];
    }
}
