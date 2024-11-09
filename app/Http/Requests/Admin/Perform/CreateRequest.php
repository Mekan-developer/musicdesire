<?php

namespace App\Http\Requests\Admin\Perform;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'video' => 'required|file|mimes:mp4,mov,avi,flv|max:500000'
        ];
    }
}
