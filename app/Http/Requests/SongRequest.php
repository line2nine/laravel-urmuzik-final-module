<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'type' => 'required|mp3_ogg_extension',
            'desc' => 'required'
        ];
    }


    public function messages()
    {
        $messages = [
            'name.required' => 'You need to enter the name of the song and the length must not exceed 255 characters',
            'type.mp3_ogg_extension' => 'The file needs to be in .mp3 format',
            'desc' => 'Description may not be blank'
        ];

        return $messages;
    }
}
