<?php

namespace App\Http\Requests\Admin\Track;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'file' => 'nullable|file|mimes:mp3,wav,ogg|max:10240',
            'track_name_ru' => 'required|string|max:255',
            'track_name_en' => 'required|string|max:255',
            'track_category' => 'required|integer|exists:track_categories,id',
            'track_lang' => 'required|integer|exists:track_langs,id',
            'track_price' => 'required|integer',
            'track_price_usd' => 'required|integer',
            'lyrics' => 'required|in:lyrics_yes,lyrics_no',
            'track_tempo' => 'required|integer',
        ];
    }
}
