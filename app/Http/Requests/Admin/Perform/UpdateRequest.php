<?php

namespace App\Http\Requests\Admin\Perform;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|integer|exists:performances,id',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255'
        ];
    }
}
