<?php

namespace Modules\News\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateNewsRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        return [
            'title' => 'required',
            'teaser' => 'required',
            'full_content' => 'required'
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
            'title' =>trans('news::messages.title is required'),
            'teaser' =>trans('news::messages.teaser is required'),
            'full_content' =>  trans('news::messages.full_content is unique'),
        ];
    }
}
