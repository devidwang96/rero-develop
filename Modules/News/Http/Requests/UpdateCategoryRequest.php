<?php

namespace Modules\News\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateCategoryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        return [
            'title' => 'required',
            'teaser' => 'required'
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
            'title.required' => trans('news::messages.title is required'),
            'teaser.required' => trans('news::messages.teaser is required'),
        ];
    }
}
