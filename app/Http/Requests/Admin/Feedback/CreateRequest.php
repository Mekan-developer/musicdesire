<?php

namespace App\Http\Requests\Admin\Feedback;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'content' => 'required|string',
            'link' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,jpg,gif,svg'
        ];
    }
}
