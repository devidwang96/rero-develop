<?php

namespace Modules\Dishes\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateDishRequest extends BaseFormRequest
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
            'title' =>trans('dishes::messages.title is required'),
        ];
    }
}
