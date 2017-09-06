<?php

namespace Modules\Mats\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateMatCategoryRequest extends BaseFormRequest
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
            'title.required' => trans('mats::matcategories.messages.title is required'),
        ];
    }
}