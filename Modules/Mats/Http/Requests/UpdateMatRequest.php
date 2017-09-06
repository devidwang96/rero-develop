<?php

namespace Modules\Mats\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateMatRequest extends BaseFormRequest
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
            'title' =>trans('mats::messages.title is required'),
        ];
    }
}