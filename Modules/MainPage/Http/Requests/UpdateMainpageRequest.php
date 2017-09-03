<?php

namespace Modules\MainPage\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateMainpageRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        return [

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

        ];
    }
}
